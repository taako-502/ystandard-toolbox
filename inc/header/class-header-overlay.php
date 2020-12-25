<?php
/**
 * Sub Header.
 *
 * @package ystandard-toolbox
 * @author  yosiakatsuki
 * @license GPL-2.0+
 */

namespace ystandard_toolbox;

defined( 'ABSPATH' ) || die();

/**
 * Class header_overlay
 *
 * @package ystandard_toolbox
 */
class Header_Overlay {

	/**
	 * Header_Overlay constructor.
	 */
	public function __construct() {
		add_action( 'ys_enqueue_script', [ $this, 'enqueue_overlay_script' ] );
		add_action( 'body_class', [ $this, 'add_overlay_class' ], 20 );
		add_filter( 'ys_css_vars', [ $this, 'overlay_css_vars' ], 20 );
		add_filter( 'get_custom_logo_image_attributes', [ $this, 'custom_logo_image_attributes' ] );
		add_filter( 'ys_get_header_logo', [ $this, 'add_overlay_logo' ] );

		new Meta_Box(
			'overlay',
			'オーバーレイ',
			[ $this, 'meta_box' ],
			[ $this, 'save_meta' ]
		);
	}


	/**
	 * Body クラス追加
	 *
	 * @param array $classes Classes.
	 *
	 * @return array
	 */
	public function add_overlay_class( $classes ) {

		if ( self::is_header_overlay() ) {
			$classes[] = 'is-overlay';
			$classes[] = 'is-transparent';
		}

		return $classes;
	}

	/**
	 * ヘッダーオーバーレイ機能有効判定
	 *
	 * @return boolean
	 */
	public static function is_header_overlay() {
		$enable = Option::get_option_by_bool( Header_Design::OPTION_NAME, 'enableOverlay', false );
		if ( ! $enable ) {
			return false;
		}
		$overlay = apply_filters( 'ystdtb_is_header_overlay', false );
		if ( $overlay ) {
			return true;
		}
		// 設定取得.
		$types = Option::get_option( Header_Design::OPTION_NAME, 'overlayPageType', [] );
		// フロントページ.
		if ( ( is_front_page() && ! is_paged() ) && in_array( 'front-page', $types, true ) ) {
			$overlay = true;
		}
		// 投稿タイプ関連.
		$post_type = Utility::get_post_type();
		// 投稿タイプ.
		if ( ! is_front_page() && ! is_home() ) {
			if ( is_singular() ) {
				if ( in_array( $post_type, $types, true ) ) {
					$overlay = true;
				}
				$meta = Post_Meta::get_post_meta( 'ystdtb-overlay' );
				$meta = empty( $meta ) ? 'none' : $meta;
				if ( 'on' === $meta ) {
					$overlay = true;
				}
				if ( 'off' === $meta ) {
					$overlay = false;
				}
			}
		}

		return $overlay;
	}

	/**
	 * オーバーレイ機能用スクリプト読み込み
	 */
	public function enqueue_overlay_script() {
		if ( ! Option::get_option_by_bool( Header_Design::OPTION_NAME, 'enableOverlay', false ) ) {
			return;
		}
		$handle = 'ystdtb-overlay';
		wp_enqueue_script(
			$handle,
			YSTDTB_URL . '/js/app/overlay.js',
			[],
			filemtime( YSTDTB_PATH . '/js/app/overlay.js' ),
			true,
		);
		wp_script_add_data( $handle, 'defer', true );
	}

	/**
	 * CSSカスタムプロパティの追加
	 *
	 * @param array $vars CSS Custom Properties.
	 *
	 * @return array
	 */
	public function overlay_css_vars( $vars ) {
		if ( ! self::is_header_overlay() ) {
			return $vars;
		}
		$vars['overlay-text-color'] = 'var(--header-text)';
		// 設定取得.
		$color = $this->get_overlay_text_color();
		// 色追加.
		if ( $color ) {
			$vars['overlay-text-color'] = $color;
		}

		return $vars;
	}

	/**
	 * オーバーレイ表示のテキストカラー取得
	 *
	 * @return string
	 */
	private function get_overlay_text_color() {
		return Option::get_option( Header_Design::OPTION_NAME, 'overlayTextColor', '' );
	}

	/**
	 * オーバーレイ用ロゴ取得
	 *
	 * @return string
	 */
	private function get_overlay_logo() {
		return Option::get_option( Header_Design::OPTION_NAME, 'overlayImage', '' );
	}

	/**
	 * ロゴにクラス追加
	 *
	 * @param array $custom_logo_attr Custom logo image attributes.
	 *
	 * @return array
	 */
	public function custom_logo_image_attributes( $custom_logo_attr ) {
		if ( ! self::is_header_overlay() || ! $this->get_overlay_logo() ) {
			return $custom_logo_attr;
		}
		$custom_logo_attr['class'] = $custom_logo_attr['class'] . ' is-normal';

		return $custom_logo_attr;
	}

	/**
	 * オーバーレイ用ロゴ追加
	 *
	 * @param string $html Logo Html.
	 *
	 * @return string
	 */
	public function add_overlay_logo( $html ) {

		if ( ! $this->has_overlay_logo() ) {
			return $html;
		}
		$image_url = $this->get_overlay_logo();
		$image     = sprintf(
			'<img class="custom-logo is-overlay" src="%s" alt="%s" />',
			$this->get_overlay_logo(),
			esc_attr( get_bloginfo( 'name' ) )
		);

		return str_replace( '</a>', $image . '</a>', $html );
	}

	/**
	 * オーバーレイ用ロゴが必要か
	 *
	 * @return bool
	 */
	private function has_overlay_logo() {
		if ( ! has_custom_logo() ) {
			return false;
		}
		if ( Option::get_ystd_option_by_bool( 'ys_logo_hidden', false ) ) {
			return false;
		}
		if ( ! self::is_header_overlay() ) {
			return false;
		}
		if ( ! $this->get_overlay_logo() ) {
			return false;
		}

		return true;
	}

	/**
	 * Meta box 表示.
	 *
	 * @param int $post_id Post ID.
	 */
	public function meta_box( $post_id ) {

		$value = Post_Meta::get_post_meta( 'ystdtb-overlay', $post_id );
		$value = empty( $value ) ? 'none' : $value;

		?>
		<div class="ystdtb-meta-box">
			<h3 class="ystdtb-meta-box__title">ヘッダーオーバーレイ</h3>
			<div class="ystdtb-meta-box__radio-horizon">
				<input id="ystdtb-overlay-none" type="radio" name="ystdtb-overlay" value="none" <?php checked( $value, 'none' ); ?>>
				<label for="ystdtb-overlay-none">-</label>

				<input id="ystdtb-overlay-on" type="radio" name="ystdtb-overlay" value="on" <?php checked( $value, 'on' ); ?>>
				<label for="ystdtb-overlay-on">ON</label>

				<input id="ystdtb-overlay-off" type="radio" name="ystdtb-overlay" value="off" <?php checked( $value, 'off' ); ?>>
				<label for="ystdtb-overlay-off">OFF</label>
			</div>
			<div class="ystdtb-meta-box__notes">
				※「-」を選択した場合、ヘッダーオーバーレイ「詳細ページ」設定に従います。
			</div>
		</div>
		<?php
	}

	/**
	 * 投稿メタ保存
	 *
	 * @param int $post_id Post ID.
	 */
	public function save_meta( $post_id ) {
		Post_Meta::save_post_meta( $post_id, 'ystdtb-overlay' );
	}
}

new Header_Overlay();

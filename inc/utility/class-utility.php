<?php
/**
 * Utility
 *
 * @package ystandard-toolbox
 * @author  yosiakatsuki
 * @license GPL-2.0+
 */

namespace ystandard_toolbox;

defined( 'ABSPATH' ) || die();

/**
 * Class Utility
 *
 * @package ystandard_toolbox
 */
class Utility {

	/**
	 * AMPが有効か
	 *
	 * @return bool
	 */
	public static function is_amp() {

		if ( function_exists( 'ys_is_amp' ) && ys_is_amp() ) {
			return ys_is_amp();
		}

		return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
	}

	/**
	 * AMPが使えるか
	 */
	public static function is_amp_enable() {
		return function_exists( 'is_amp_endpoint' );
	}

	/**
	 * ショートコードようにパラメーターを展開
	 *
	 * @param array $attributes Attributes.
	 *
	 * @return string
	 */
	public static function parse_shortcode_attributes( $attributes ) {
		$result = '';
		foreach ( $attributes as $key => $value ) {
			if ( is_array( $value ) ) {
				$value = implode( ',', $value );
			}
			$result .= "${key}=\"${value}\" ";
		}

		return $result;
	}

	/**
	 * WordPressのバージョンチェック
	 *
	 * @param string $version バージョン.
	 *
	 * @return bool|int
	 */
	public static function wordpress_version_compare( $version ) {

		$wp_version = get_bloginfo( 'version' );

		return version_compare( $wp_version, $version, '>=' );
	}

	/**
	 * テーマのバージョンチェック
	 *
	 * @param string $version バージョン.
	 *
	 * @return bool|int
	 */
	public static function ystandard_version_compare( $version = '' ) {

		if ( 'ystandard' !== get_template() ) {
			return false;
		}
		// バージョンの確認不要であればテーマの確認のみ.
		if ( '' === $version ) {
			return true;
		}
		$theme = wp_get_theme( get_template() );
		if ( is_null( $theme ) ) {
			return false;
		}
		$theme_version = $theme->version;

		return version_compare( $theme_version, $version, '>=' );
	}

	/**
	 *  [yStandard Blocks]のバージョンチェック
	 *
	 * @param string $version バージョン.
	 *
	 * @return bool|int
	 */
	public static function ystandard_blocks_version_compare( $version = '' ) {
		$blocks = apply_filters( 'ystdb_get_version', '' );
		if ( '' === $blocks ) {
			return false;
		}
		// バージョンの確認不要であればプラグインの確認のみ.
		if ( '' === $version ) {
			return true;
		}

		return version_compare( $blocks, $version, '>=' );
	}

	/**
	 * Bool値に変換
	 *
	 * @param mixed $value value.
	 *
	 * @return bool
	 */
	public static function to_bool( $value ) {
		if ( true === $value || 'true' === $value || 1 === $value || '1' === $value ) {
			return true;
		}

		return false;
	}

	/**
	 * Jsonファイルの中身を取得
	 *
	 * @param string $path json file path.
	 *
	 * @return array|mixed
	 */
	public static function get_json_file_contents( $path ) {
		$contents = self::get_file_contents( $path );
		if ( ! $contents ) {
			return [];
		}
		$json = json_decode( $contents, true );
		if ( is_null( $json ) ) {
			return [];
		}

		return $json;
	}


	/**
	 * ファイル取得
	 *
	 * @param string $path File path.
	 *
	 * @return bool|string
	 */
	public static function get_file_contents( $path ) {
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
		}
		$content = false;
		if ( WP_Filesystem() ) {
			global $wp_filesystem;
			$content = $wp_filesystem->get_contents( $path );
		}

		return $content;
	}

	/**
	 * CSSの圧縮
	 *
	 * @param string $style inline css styles.
	 *
	 * @return string
	 */
	public static function minify( $style ) {
		$style = preg_replace( '#/\*[^!][^*]*\*+([^/][^*]*\*+)*/#', '', $style );
		$style = str_replace( ': ', ':', $style );
		$style = str_replace( [ "\r\n", "\r", "\n", "\t" ], '', $style );
		$style = str_replace( [ '  ', '   ', '    ' ], ' ', $style );

		return $style;
	}

	/**
	 * メディアクエリを追加
	 *
	 * @param string $css Styles.
	 * @param string $min Breakpoint.
	 * @param string $max Breakpoint.
	 *
	 * @return string
	 */
	public static function add_media_query( $css, $min = '', $max = '' ) {
		$breakpoints = apply_filters( 'ystdtb_css_breakpoints', Config::BREAKPOINTS );
		if ( ! array_key_exists( $min, $breakpoints ) && ! array_key_exists( $max, $breakpoints ) ) {
			return $css;
		}
		if ( array_key_exists( $min, $breakpoints ) ) {
			$breakpoint = $breakpoints[ $min ];
			$min        = "(min-width: ${breakpoint}px)";
		}
		if ( array_key_exists( $max, $breakpoints ) ) {
			$breakpoint = $breakpoints[ $max ] - 1;
			$max        = "(max-width: ${breakpoint}px)";
		}
		$breakpoint = $min . $max;
		if ( '' !== $min && '' !== $max ) {
			$breakpoint = $min . ' AND ' . $max;
		}

		if ( empty( $breakpoint ) ) {
			return $css;
		}

		return sprintf(
			'@media %s {%s}',
			$breakpoint,
			$css
		);
	}

	/**
	 * マニュアルリンク作成
	 *
	 * @param string $url   URL.
	 * @param string $text  Text.
	 * @param string $class CSS Class.
	 *
	 * @return string
	 */
	public static function manual_link( $url, $text = '', $class = '' ) {
		$link = self::manual_link_a( $url, $text, $class );
		if ( empty( $link ) ) {
			return '';
		}

		return wp_targeted_link_rel( "<div class=\"ystdtb-menu__manual-link\">${link}</div>" );
	}

	/**
	 * マニュアルリンク(インライン)作成
	 *
	 * @param string $url   URL.
	 * @param string $text  Text.
	 * @param string $class CSS Class.
	 *
	 * @return string
	 */
	public static function manual_link_inline( $url, $text = '', $class = '' ) {
		$link = self::manual_link_a( $url, $text, $class );
		if ( empty( $link ) ) {
			return '';
		}

		return wp_targeted_link_rel( "<div class=\"ystdtb-menu__manual-link-inline\">${link}</div>" );
	}

	/**
	 * マニュアルリンク作成
	 *
	 * @param string $url   URL.
	 * @param string $text  Text.
	 * @param string $class CSS Class.
	 *
	 * @return string
	 */
	public static function manual_link_a( $url, $text = '', $class = '' ) {
		if ( empty( $url ) ) {
			return '';
		}

		if ( '' === $text ) {
			$text = 'マニュアルを見る';
		}
		$icon = '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>';

		if ( false === strpos( $url, 'https://' ) ) {
			$url = 'ystdtb-' . $url;
			$url = add_query_arg(
				[
					'utm_source'   => 'manual-link',
					'utm_medium'   => 'referral',
					'utm_campaign' => $url,
				],
				"https://wp-ystandard.com/${url}/"
			);
		}
		$class = '' === $class ? '' : "class=\"$class\"";

		return "<a ${class} href=\"${url}\" target=\"_blank\">${icon}${text}</a>";
	}

	/**
	 * メニューアイコン取得
	 *
	 * @return string
	 */
	public static function get_menu_icon() {
		$icon = Utility::get_file_contents( YSTDTB_PATH . '/assets/menu/toolbox.svg' );

		return 'data:image/svg+xml;base64,' . base64_encode( $icon );
	}

	/**
	 * カラーコードをrgbに変換
	 *
	 * @param string $color カラーコード.
	 *
	 * @return array
	 */
	public static function hex_2_rgb( $color ) {
		return [
			hexdec( substr( $color, 1, 2 ) ),
			hexdec( substr( $color, 3, 2 ) ),
			hexdec( substr( $color, 5, 2 ) ),
		];
	}

	/**
	 * 投稿タイプ取得
	 *
	 * @param array $args    args.
	 * @param bool  $exclude 除外.
	 *
	 * @return array
	 */
	public static function get_post_types( $args = [], $exclude = true ) {
		$args = array_merge(
			[ 'public' => true ],
			$args
		);

		$types = get_post_types( $args );

		if ( is_array( $exclude ) ) {
			$exclude[] = 'attachment';
			foreach ( $exclude as $item ) {
				unset( $types[ $item ] );
			}
		}

		if ( true === $exclude ) {
			unset( $types['attachment'] );
		}

		foreach ( $types as $key => $value ) {
			$post_type = get_post_type_object( $key );
			if ( $post_type ) {
				$types[ $key ] = $post_type->labels->singular_name;
			}
		}

		return $types;
	}

	/**
	 * Nonceチェック
	 *
	 * @param string $name   Name.
	 * @param string $action Action.
	 *
	 * @return bool|int
	 */
	public static function verify_nonce( $name, $action ) {
		// nonceがセットされているかどうか確認.
		if ( ! isset( $_POST[ $name ] ) ) {
			return false;
		}

		return wp_verify_nonce( $_POST[ $name ], $action );
	}

	/**
	 * タイトルタグ用タイトルの作成
	 *
	 * @param string $title Title.
	 */
	public static function get_document_title( $title ) {

		$title = apply_filters(
			'document_title_parts',
			[
				'title'   => $title,
				'page'    => '',
				'tagline' => '',
				'site'    => get_bloginfo( 'name', 'display' ),
			]
		);
		$sep   = apply_filters( 'document_title_separator', '-' );
		$title = implode( " $sep ", array_filter( $title ) );
		$title = wptexturize( $title );
		$title = convert_chars( $title );
		$title = esc_html( $title );
		$title = capital_P_dangit( $title );

		return $title;
	}

	/**
	 * カテゴリー・タグ・ターム 一覧ページかどうか
	 */
	public static function is_term_archive() {
		return is_tax() || is_category() || is_tag();
	}

	/**
	 * 使える画像サイズ一覧取得
	 *
	 * @return array
	 */
	public static function get_image_sizes() {
		global $_wp_additional_image_sizes;
		$sizes = [];
		foreach ( get_intermediate_image_sizes() as $size ) {
			if ( in_array( $size, [ 'thumbnail', 'medium', 'medium_large', 'large' ], true ) ) {
				$sizes[ $size ]['width']  = get_option( "{$size}_size_w" );
				$sizes[ $size ]['height'] = get_option( "{$size}_size_h" );
			} elseif ( isset( $_wp_additional_image_sizes[ $size ] ) ) {
				$sizes[ $size ] = [
					'width'  => $_wp_additional_image_sizes[ $size ]['width'],
					'height' => $_wp_additional_image_sizes[ $size ]['height'],
				];

			}
		}
		/**
		 * フルサイズ追加
		 */
		$sizes['full'] = [
			'width'  => '-',
			'height' => '-',
		];

		return $sizes;
	}

	/**
	 * モバイル判定
	 *
	 * @return bool
	 */
	public static function is_mobile() {
		if ( function_exists( 'ys_is_mobile' ) ) {
			return ys_is_mobile();
		}

		return wp_is_mobile();
	}
}

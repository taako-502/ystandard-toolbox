<?php
/**
 * @package ystandard-toolbox
 * @author  yosiakatsuki
 * @license GPL-2.0+
 */

namespace ystandard_toolbox;

defined( 'ABSPATH' ) || die();

/**
 * Class Menu_Page
 *
 * @package ystandard_toolbox
 */
class Menu_Page {

	/**
	 * メニュー名
	 */
	const MENU_SLUG = 'ystdtb-menu';
	/**
	 * メニューページプレフィックス
	 */
	const MENU_PAGE_PREFIX = 'ystdtb-menu';


	/**
	 * Menu_Page constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'add_menu_page' ], 50 );
		$this->load();
	}

	/**
	 * 読み込み
	 */
	private function load() {
		require_once __DIR__ . '/class-menu-page-base.php';
		require_once __DIR__ . '/class-menu-start.php';
		require_once __DIR__ . '/class-menu-heading.php';
		require_once __DIR__ . '/class-menu-code.php';
		require_once __DIR__ . '/class-menu-font.php';
	}

	/**
	 *
	 */
	public function add_menu_page() {
		add_menu_page(
			'yStandard Toolbox',
			'[ys] Toolbox',
			'manage_options',
			self::MENU_SLUG,
			'',
			$this->menu_icon(),
			59
		);
	}

	/**
	 * メニューアイコン
	 *
	 * @return string
	 */
	private function menu_icon() {
		$icon = Utility::get_file_contents( YSTDTB_PATH . '/assets/menu/toolbox.svg' );

		return 'data:image/svg+xml;base64,' . base64_encode( $icon );
	}

	/**
	 * メニューページURL取得
	 *
	 * @param string $name Name.
	 *
	 * @return string
	 */
	public static function get_menu_page_url( $name ) {
		$menu_page = self::MENU_PAGE_PREFIX . $name;

		return esc_url_raw( admin_url( "admin.php?page=${menu_page}" ) );
	}
}

new Menu_Page();

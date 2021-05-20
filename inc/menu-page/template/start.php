<?php
/**
 * Start Page
 *
 * @package ystandard-toolbox
 * @author  yosiakatsuki
 * @license GPL-2.0+
 */

namespace ystandard_toolbox;

defined( 'ABSPATH' ) || die();
?>
<div class="start ystdtb-menu__start ystdtb-menu__component ystdtb-menu__form">
	<h1 class="ystdtb-menu__title">yStandard Toolbox</h1>
	<?php
	/**
	 * デザイン機能
	 */
	?>
	<div class="ystdtb-menu__section">
		<h2 class="ystdtb-menu__section_title">デザイン機能</h2>
		<div class="ystdtb-menu__column">
			<div class="ystdtb-menu__column-item">
				<h3>見出しデザイン編集</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
					</svg>
				</figure>
				<p>コンテンツやページタイトルのデザインをカスタマイズできる機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'heading', '', 'button is-primary is-small' );
					echo Utility::manual_link_a( 'manual/ystdtb-heading', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>Webフォント追加</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-type">
						<polyline points="4 7 4 4 20 4 20 7"></polyline>
						<line x1="9" y1="20" x2="15" y2="20"></line>
						<line x1="12" y1="4" x2="12" y2="20"></line>
					</svg>
				</figure>
				<p>Google Fontsなどを使ってWebフォントを追加する機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'font', '', 'button is-primary is-small' );
					echo Utility::manual_link_a( 'manual/ystdtb-add-font', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>ヘッダーオーバーレイ</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
						<polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
						<polyline points="2 17 12 22 22 17"></polyline>
						<polyline points="2 12 12 17 22 12"></polyline>
					</svg>
				</figure>
				<p>
					ヘッダーを透明にしてコンテンツに重ねて表示できる機能<br>
					ページ先頭に大きく画像や動画を表示するレイアウトに便利です。
				</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'header-design', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-header-overlay', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>アーカイブページ拡張</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
						<rect x="3" y="3" width="7" height="7"></rect>
						<rect x="14" y="3" width="7" height="7"></rect>
						<rect x="14" y="14" width="7" height="7"></rect>
						<rect x="3" y="14" width="7" height="7"></rect>
					</svg>
				</figure>
				<p>投稿一覧のデフォルト画像や一覧画像サイズ、一覧レイアウトを変更できる機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'archive', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-archive', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>モバイルメニュー拡張</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone">
						<rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
						<line x1="12" y1="18" x2="12.01" y2="18"></line>
					</svg>
				</figure>
				<p>ウィジェットを使ってモバイルメニュー内にボタンや記事一覧などを配置できる機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'menu-navigation', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-mobile-menu-widget', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>サブヘッダーメニュー</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				</figure>
				<p>
					ヘッダーの上に追加で小さくメニューを表示できる機能
				</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'header-design', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-sub-header', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>投稿詳細上下部並び替え</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
						<line x1="8" y1="6" x2="21" y2="6"></line>
						<line x1="8" y1="12" x2="21" y2="12"></line>
						<line x1="8" y1="18" x2="21" y2="18"></line>
						<line x1="3" y1="6" x2="3.01" y2="6"></line>
						<line x1="3" y1="12" x2="3.01" y2="12"></line>
						<line x1="3" y1="18" x2="3.01" y2="18"></line>
					</svg>
				</figure>
				<p>
					投稿詳細ページの本文上・下のSNSシェアボタンや関連記事の表示順序を変更できる機能
				</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'cta', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-cta', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>追加CSS編集</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-droplet">
						<path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
					</svg>
				</figure>
				<p>「外観」→「カスタマイズ」→「追加CSS」で編集できるCSSを大きい入力欄で編集する機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'css', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-custom-css', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>Copyright編集</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award">
						<circle cx="12" cy="8" r="7"></circle>
						<polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
					</svg>
				</figure>
				<p>サイトフッターに表示されるCopyright表記の編集、「yStandard Theme by yosiakatsuki Powered by WordPress」の削除機能</p>

				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'copyright', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-copyright', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>

			<div class="ystdtb-menu__column-item">
				<h3>ウィジェット子階層折りたたみ</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize-2">
						<polyline points="4 14 10 14 10 20"></polyline>
						<polyline points="20 10 14 10 14 4"></polyline>
						<line x1="14" y1="10" x2="21" y2="3"></line>
						<line x1="3" y1="21" x2="10" y2="14"></line>
					</svg>
				</figure>
				<p>カテゴリー・ナビゲーションメニュー・固定ページウィジェットで子階層を折りたたみ表示する機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::manual_link( 'manual/ystdtb-widget-accordion', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
	/**
	 * ブロック機能
	 */
	?>
	<div class="ystdtb-menu__section">
		<h2 class="ystdtb-menu__section_title">ブロック機能</h2>
		<div class="ystdtb-menu__column">
			<div class="ystdtb-menu__column-item">
				<h3>ブロックパターン</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
						<rect x="3" y="3" width="7" height="7"></rect>
						<rect x="14" y="3" width="7" height="7"></rect>
						<rect x="14" y="14" width="7" height="7"></rect>
						<rect x="3" y="14" width="7" height="7"></rect>
					</svg>
				</figure>
				<p>よく使う定型文などを登録してブロックエディターで簡単に利用できる機能</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-patterns', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>ブロックスタイル</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag">
						<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
						<line x1="4" y1="22" x2="4" y2="15"></line>
					</svg>
				</figure>
				<p>カラムブロックやテーブルブロックなどの便利なデザインスタイル</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-styles', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>タイムラインブロック</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
						<circle cx="12" cy="12" r="10"></circle>
						<polyline points="12 6 12 12 16 14"></polyline>
					</svg>
				</figure>
				<p>時系列に略歴を表示したり、手順の説明などに便利なタイムライン（ステップ）ブロック</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-timeline', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>Q&Aブロック</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
						<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
					</svg>
				</figure>
				<p>「よくある質問」ページの制作に便利なブロック</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-faq', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>アイコンリストブロック</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
				</figure>
				<p>マーカーにアイコンを表示できるリストブロック</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-icon-list', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>記事一覧ブロック</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
						<polyline points="21 8 21 21 3 21 3 8"></polyline>
						<rect x="1" y="3" width="22" height="5"></rect>
						<line x1="10" y1="12" x2="14" y2="12"></line>
					</svg>
				</figure>
				<p>投稿の一覧を様々な条件で絞り込み表示できるブロック</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-posts', '', 'button is-primary is-small' ); ?>
			</div>

			<div class="ystdtb-menu__column-item">
				<h3>シェアボタンブロック</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2">
						<circle cx="18" cy="5" r="3"></circle>
						<circle cx="6" cy="12" r="3"></circle>
						<circle cx="18" cy="19" r="3"></circle>
						<line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
						<line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
					</svg>
				</figure>
				<p>SNSシェアボタンを表示できるブロック</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-block-sns-share', '', 'button is-primary is-small' ); ?>
			</div>
		</div>
	</div>
	<?php
	/**
	 * SEO関連機能
	 */
	?>
	<div class="ystdtb-menu__section">
		<h2 class="ystdtb-menu__section_title">SEO関連機能</h2>
		<div class="ystdtb-menu__column">
			<div class="ystdtb-menu__column-item">
				<h3>投稿のtitle,description設定</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
						<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
						<polyline points="22 4 12 14.01 9 11.01"></polyline>
					</svg>
				</figure>
				<p>投稿タイトルとは別の&lt;title&gt;設定、メタデスクリプションを設定できる機能</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-title-dscr', '', 'button is-primary is-small' ); ?>
			</div>
			<div class="ystdtb-menu__column-item">
				<h3>一覧のtitle,description設定</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
						<polyline points="21 8 21 21 3 21 3 8"></polyline>
						<rect x="1" y="3" width="22" height="5"></rect>
						<line x1="10" y1="12" x2="14" y2="12"></line>
					</svg>
				</figure>
				<p>カテゴリー・タグ一覧ページの&lt;title&gt;設定、メタデスクリプションを設定できる機能</p>
				<?php echo Utility::manual_link( 'manual/ystdtb-term-meta-seo', '', 'button is-primary is-small' ); ?>
			</div>
		</div>
	</div>
	<?php
	/**
	 * その他機能
	 */
	?>
	<div class="ystdtb-menu__section">
		<h2 class="ystdtb-menu__section_title">その他機能</h2>
		<div class="ystdtb-menu__column">
			<div class="ystdtb-menu__column-item">
				<h3>コード追加</h3>
				<figure class="ystdtb-menu__column-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
						<polyline points="16 18 22 12 16 6"></polyline>
						<polyline points="8 6 2 12 8 18"></polyline>
					</svg>
				</figure>
				<p>&lt;head&gt;内や&lt;/body&gt;直前などにJavaScriptなどを追加できる機能</p>
				<div class="ystdtb-menu__manual-link is-horizon">
					<?php
					echo Utility::option_link_a( 'code', '', 'button is-primary is-small' );
					echo Utility::manual_link( 'manual/ystdtb-add-code', 'マニュアル', 'button is-primary is-small' );
					?>
				</div>
			</div>
		</div>
	</div>

</div>





















































<?php
/**
 * Plugin Name: ミナモ精工 採用サイト基本設定
 * Description: カスタム投稿タイプ・タクソノミー・オプションページ・ショートコードを登録します（移行デモ用）。
 *
 * 実案件でよくある「テーマの functions.php に書かれた登録コード」を想定しています。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', function () {
	// 募集職種
	register_post_type( 'job', array(
		'labels'       => array(
			'name'          => '募集職種',
			'singular_name' => '募集職種',
			'add_new_item'  => '募集職種を追加',
			'edit_item'     => '募集職種を編集',
		),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-id-alt',
		'menu_position'=> 5,
		'supports'     => array( 'title', 'excerpt', 'thumbnail', 'revisions' ),
		'rewrite'      => array( 'slug' => 'jobs', 'with_front' => false ),
		'show_in_rest' => true,
	) );

	// 働く人（社員インタビュー）
	register_post_type( 'interview', array(
		'labels'       => array(
			'name'          => '働く人',
			'singular_name' => '社員インタビュー',
			'add_new_item'  => 'インタビューを追加',
			'edit_item'     => 'インタビューを編集',
		),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-groups',
		'menu_position'=> 6,
		'supports'     => array( 'title', 'excerpt', 'thumbnail', 'revisions' ),
		'rewrite'      => array( 'slug' => 'people', 'with_front' => false ),
		'show_in_rest' => true,
	) );

	// 部署（階層あり）
	register_taxonomy( 'department', array( 'job', 'interview' ), array(
		'labels'            => array( 'name' => '部署', 'singular_name' => '部署' ),
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'department', 'with_front' => false ),
		'show_in_rest'      => true,
	) );

	// 勤務地・拠点
	register_taxonomy( 'work_location', array( 'job', 'interview' ), array(
		'labels'            => array( 'name' => '拠点', 'singular_name' => '拠点' ),
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'location', 'with_front' => false ),
		'show_in_rest'      => true,
	) );
} );

// オプションページ（SCF / ACF）
add_action( 'acf/init', function () {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => '採用サイト設定',
			'menu_title' => '採用サイト設定',
			'menu_slug'  => 'minamo-recruit-settings',
			'capability' => 'edit_posts',
			'icon_url'   => 'dashicons-admin-generic',
			'position'   => 7,
		) );
	}
} );

/**
 * 独自ショートコード（「テーマ依存のショートコード」の例）
 * [minamo_button url="/jobs/" label="募集職種を見る" style="primary"]
 */
add_shortcode( 'minamo_button', function ( $atts ) {
	$atts = shortcode_atts( array(
		'url'   => '#',
		'label' => '詳しく見る',
		'style' => 'primary',
	), $atts );
	return sprintf(
		'<a class="minamo-btn minamo-btn--%s" href="%s">%s</a>',
		esc_attr( $atts['style'] ),
		esc_url( $atts['url'] ),
		esc_html( $atts['label'] )
	);
} );

/**
 * [minamo_note type="info"]本文[/minamo_note]
 */
add_shortcode( 'minamo_note', function ( $atts, $content = '' ) {
	$atts = shortcode_atts( array( 'type' => 'info' ), $atts );
	return sprintf(
		'<div class="minamo-note minamo-note--%s">%s</div>',
		esc_attr( $atts['type'] ),
		wpautop( do_shortcode( $content ) )
	);
} );

// ショートコード用の最低限のスタイル
add_action( 'wp_head', function () {
	echo '<style>
.minamo-btn{display:inline-block;padding:.8em 1.6em;border-radius:999px;text-decoration:none;font-weight:700}
.minamo-btn--primary{background:#0f6e7a;color:#fff}
.minamo-btn--secondary{border:2px solid #0f6e7a;color:#0f6e7a}
.minamo-note{padding:1em 1.2em;border-left:4px solid #0f6e7a;background:#eef7f8;margin:1.5em 0}
.minamo-note--warning{border-color:#c77d14;background:#fdf5e8}
.minamo-red{color:#c0392b;font-weight:700}
</style>';
} );

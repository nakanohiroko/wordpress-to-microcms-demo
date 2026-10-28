<?php
/**
 * ミナモ精工 採用サイト テーマ設定
 */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
} );

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'minamo-recruit', get_stylesheet_uri(), array(), '1.0' );
} );

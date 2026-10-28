<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">

<header class="site-header">
  <div class="inner">
    <div class="site-branding">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    </div>
    <nav class="primary-nav" aria-label="グローバルナビゲーション">
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/jobs/' ) ); ?>">募集職種</a></li>
        <li><a href="<?php echo esc_url( home_url( '/people/' ) ); ?>">働く人</a></li>
        <?php
        $blog_page_id = get_option( 'page_for_posts' );
        $blog_url     = $blog_page_id ? get_permalink( $blog_page_id ) : home_url( '/' );
        ?>
        <li><a href="<?php echo esc_url( $blog_url ); ?>">お知らせ・ブログ</a></li>
        <li><a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社を知る</a></li>
        <li class="nav-cta"><a href="<?php echo esc_url( home_url( '/entry/' ) ); ?>">エントリー</a></li>
      </ul>
    </nav>
  </div>
</header>

<div class="site-content">

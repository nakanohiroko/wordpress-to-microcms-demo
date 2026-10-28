<?php get_header(); ?>

<div class="container page-inner">
  <?php if ( have_posts() ) : the_post(); ?>

  <article class="entry">
    <header class="entry__header">
      <div class="entry__meta">
        <?php $cat = get_the_category(); if ( $cat ) : ?>
          <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>" class="tag"><?php echo esc_html( $cat[0]->name ); ?></a>
        <?php endif; ?>
        <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y年m月d日' ); ?></time>
        <span><?php the_author(); ?></span>
      </div>
      <h1 class="entry__title"><?php the_title(); ?></h1>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="entry__thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
    <?php endif; ?>

    <div class="entry__content">
      <?php the_content(); ?>
    </div>

    <?php
    $tags = get_the_tags();
    if ( $tags ) :
    ?>
    <div style="margin-top:2.5rem;padding-top:1.5rem;border-top:1px solid var(--color-border)">
      <p style="font-size:.8rem;color:var(--color-muted);margin-bottom:.5rem">タグ：</p>
      <div style="display:flex;gap:.4rem;flex-wrap:wrap">
        <?php foreach ( $tags as $tag ) : ?>
          <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag"><?php echo esc_html( $tag->name ); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </article>

  <div style="margin-top:3rem;padding-top:2rem;border-top:1px solid var(--color-border);text-align:center">
    <?php
    $blog_page_id = get_option( 'page_for_posts' );
    $blog_url     = $blog_page_id ? get_permalink( $blog_page_id ) : home_url( '/' );
    ?>
    <a href="<?php echo esc_url( $blog_url ); ?>" class="btn btn-outline-teal">← 一覧に戻る</a>
  </div>

  <?php endif; ?>
</div>

<?php get_footer(); ?>

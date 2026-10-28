<?php get_header(); ?>

<div class="page-header">
  <div class="container">
    <p class="en">News &amp; Blog</p>
    <h1>お知らせ・ブログ</h1>
  </div>
</div>

<div class="container page-inner">
  <div class="post-list">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
      $cat = get_the_category();
    ?>
    <article class="post-item">
      <?php if ( has_post_thumbnail() ) : ?>
      <div class="post-item__img">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
      </div>
      <?php endif; ?>
      <div class="post-item__body">
        <div class="post-item__meta">
          <?php if ( $cat ) : ?>
            <span class="post-item__cat"><?php echo esc_html( $cat[0]->name ); ?></span>
          <?php endif; ?>
          <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time>
          <span><?php the_author(); ?></span>
        </div>
        <h2 class="post-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="post-item__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 55 ) ); ?></p>
      </div>
    </article>
    <?php endwhile; endif; ?>
  </div>

  <div class="pagination">
    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
  </div>
</div>

<?php get_footer(); ?>

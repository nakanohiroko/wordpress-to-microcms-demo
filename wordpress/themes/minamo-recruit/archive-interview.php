<?php get_header(); ?>

<div class="page-header">
  <div class="container">
    <p class="en">People</p>
    <h1>働く人</h1>
  </div>
</div>

<div class="container page-inner">
  <div class="people-grid">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
      $dept = get_the_terms( get_the_ID(), 'department' );
    ?>
    <a href="<?php the_permalink(); ?>" class="person-card">
      <?php if ( has_post_thumbnail() ) : ?>
      <div class="person-card__img"><?php the_post_thumbnail( 'medium' ); ?></div>
      <?php endif; ?>
      <div class="person-card__body">
        <p class="person-card__name"><?php the_title(); ?></p>
        <?php if ( $dept && ! is_wp_error( $dept ) ) : ?>
          <p class="person-card__dept"><?php echo esc_html( $dept[0]->name ); ?></p>
        <?php endif; ?>
        <p class="person-card__copy"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
      </div>
    </a>
    <?php endwhile; endif; ?>
  </div>

  <div class="pagination">
    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
  </div>
</div>

<?php get_footer(); ?>

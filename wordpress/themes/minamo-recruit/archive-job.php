<?php get_header(); ?>

<div class="page-header">
  <div class="container">
    <p class="en">Recruit</p>
    <h1>募集職種</h1>
  </div>
</div>

<div class="container page-inner">
  <div class="job-grid">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
      $is_open  = function_exists( 'get_field' ) ? get_field( 'field_job_is_open' ) : true;
      $h_type   = function_exists( 'get_field' ) ? get_field( 'field_job_hiring_type' ) : '';
      $dept     = get_the_terms( get_the_ID(), 'department' );
      $location = get_the_terms( get_the_ID(), 'work_location' );
      $type_map = array( 'new_grad' => '新卒採用', 'career' => 'キャリア採用' );
    ?>
    <article class="job-card">
      <div class="job-card__body">
        <div class="job-card__tags">
          <?php if ( $dept && ! is_wp_error( $dept ) ) : ?>
            <span class="job-card__tag"><?php echo esc_html( $dept[0]->name ); ?></span>
          <?php endif; ?>
          <?php if ( $h_type && isset( $type_map[ $h_type ] ) ) : ?>
            <span class="job-card__tag"><?php echo esc_html( $type_map[ $h_type ] ); ?></span>
          <?php endif; ?>
          <?php if ( $location && ! is_wp_error( $location ) ) : ?>
            <span class="job-card__tag"><?php echo esc_html( $location[0]->name ); ?></span>
          <?php endif; ?>
          <?php if ( ! $is_open ) : ?>
            <span class="job-card__tag job-card__tag--closed">募集終了</span>
          <?php endif; ?>
        </div>
        <h2 class="job-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="job-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 40 ) ); ?></p>
      </div>
      <div class="job-card__footer">
        <a href="<?php the_permalink(); ?>">詳しく見る →</a>
        <?php if ( ! $is_open ) : ?>
          <span class="badge-closed">募集終了</span>
        <?php else : ?>
          <span class="badge-open">募集中</span>
        <?php endif; ?>
      </div>
    </article>
    <?php endwhile; endif; ?>
  </div>

  <div class="pagination">
    <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
  </div>
</div>

<?php get_footer(); ?>

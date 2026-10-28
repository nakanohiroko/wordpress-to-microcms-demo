<?php get_header(); ?>

<?php if ( have_posts() ) : the_post(); ?>

<div class="page-header">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<div class="container page-inner">
  <div class="page-content">
    <?php the_content(); ?>
  </div>
</div>

<?php endif; ?>

<?php get_footer(); ?>

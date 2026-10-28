<?php get_header(); ?>

<!-- Hero -->
<section class="hero">
  <div class="container">
    <p class="hero__label">Recruit 2026</p>
    <h1 class="hero__title">見えないところで、<br>世界を支える。</h1>
    <p class="hero__sub">産業用センサーと精密部品で、製造業の現場を支えるミナモ精工。<br>技術で未来をつくる仲間を募集しています。</p>
    <div class="hero__actions">
      <a href="<?php echo esc_url( home_url( '/jobs/' ) ); ?>" class="btn btn-primary">募集職種を見る</a>
      <a href="<?php echo esc_url( home_url( '/people/' ) ); ?>" class="btn btn-outline">社員インタビュー</a>
    </div>
  </div>
</section>

<!-- 数字で見るミナモ精工 -->
<?php
$numbers = function_exists( 'get_field' ) ? get_field( 'field_set_numbers', 'option' ) : array();
if ( $numbers ) :
?>
<section class="numbers-section">
  <div class="container">
    <h2>数字で見るミナモ精工</h2>
    <div class="numbers-grid">
      <?php foreach ( array_slice( $numbers, 0, 6 ) as $item ) : ?>
      <div class="number-item">
        <p class="number-item__value">
          <?php echo esc_html( $item['value'] ); ?><span class="number-item__unit"><?php echo esc_html( $item['unit'] ); ?></span>
        </p>
        <p class="number-item__label"><?php echo esc_html( $item['label'] ); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- 募集職種 -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2><span class="en">Recruit</span>募集職種</h2>
      <a href="<?php echo esc_url( home_url( '/jobs/' ) ); ?>" class="more">すべて見る →</a>
    </div>
    <?php
    $jobs = new WP_Query( array(
      'post_type'      => 'job',
      'posts_per_page' => 6,
      'orderby'        => 'date',
      'order'          => 'DESC',
    ) );
    if ( $jobs->have_posts() ) :
    ?>
    <div class="job-grid">
      <?php while ( $jobs->have_posts() ) : $jobs->the_post();
        $is_open  = function_exists( 'get_field' ) ? get_field( 'field_job_is_open' ) : true;
        $h_type   = function_exists( 'get_field' ) ? get_field( 'field_job_hiring_type' ) : '';
        $dept     = get_the_terms( get_the_ID(), 'department' );
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
            <?php if ( ! $is_open ) : ?>
              <span class="job-card__tag job-card__tag--closed">募集終了</span>
            <?php endif; ?>
          </div>
          <h3 class="job-card__title"><?php the_title(); ?></h3>
          <p class="job-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 35 ) ); ?></p>
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
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- 働く人 -->
<section class="section section--bg">
  <div class="container">
    <div class="section-header">
      <h2><span class="en">People</span>働く人</h2>
      <a href="<?php echo esc_url( home_url( '/people/' ) ); ?>" class="more">すべて見る →</a>
    </div>
    <?php
    $people = new WP_Query( array(
      'post_type'      => 'interview',
      'posts_per_page' => 4,
      'post_status'    => 'publish',
    ) );
    if ( $people->have_posts() ) :
    ?>
    <div class="people-grid">
      <?php while ( $people->have_posts() ) : $people->the_post();
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
          <p class="person-card__copy"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></p>
        </div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- お知らせ・ブログ -->
<section class="section">
  <div class="container">
    <?php
    $blog_page_id = get_option( 'page_for_posts' );
    $blog_url     = $blog_page_id ? get_permalink( $blog_page_id ) : home_url( '/' );
    ?>
    <div class="section-header">
      <h2><span class="en">News &amp; Blog</span>お知らせ・ブログ</h2>
      <a href="<?php echo esc_url( $blog_url ); ?>" class="more">すべて見る →</a>
    </div>
    <?php
    $news = new WP_Query( array(
      'post_type'      => 'post',
      'posts_per_page' => 5,
      'post_status'    => 'publish',
    ) );
    if ( $news->have_posts() ) :
    ?>
    <div class="news-list">
      <?php while ( $news->have_posts() ) : $news->the_post();
        $cat = get_the_category();
      ?>
      <div class="news-item">
        <a href="<?php the_permalink(); ?>">
          <span class="news-item__date"><?php echo get_the_date( 'Y.m.d' ); ?></span>
          <?php if ( $cat ) : ?>
            <span class="news-item__cat"><?php echo esc_html( $cat[0]->name ); ?></span>
          <?php endif; ?>
          <span class="news-item__title"><?php the_title(); ?></span>
        </a>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>

<?php get_header(); ?>

<div class="container page-inner">
  <?php if ( have_posts() ) : the_post();
    $photo    = function_exists( 'get_field' ) ? get_field( 'field_iv_photo' ) : 0;
    $role     = function_exists( 'get_field' ) ? get_field( 'field_iv_role' ) : '';
    $year     = function_exists( 'get_field' ) ? get_field( 'field_iv_joined_year' ) : '';
    $jtype    = function_exists( 'get_field' ) ? get_field( 'field_iv_joined_type' ) : '';
    $copy     = function_exists( 'get_field' ) ? get_field( 'field_iv_catchcopy' ) : '';
    $qa       = function_exists( 'get_field' ) ? get_field( 'field_iv_qa' ) : array();
    $schedule = function_exists( 'get_field' ) ? get_field( 'field_iv_schedule' ) : array();
    $rel_jobs = function_exists( 'get_field' ) ? get_field( 'field_iv_related_jobs' ) : array();
    $dept     = get_the_terms( get_the_ID(), 'department' );
    $location = get_the_terms( get_the_ID(), 'work_location' );
    $jtype_map = array( 'new_grad' => '新卒入社', 'career' => 'キャリア入社' );
  ?>

  <article class="entry-iv">

    <!-- プロフィール -->
    <div class="entry-iv__hero">
      <?php if ( $photo ) : ?>
      <div class="entry-iv__photo">
        <?php echo wp_get_attachment_image( intval( $photo ), 'large' ); ?>
      </div>
      <?php elseif ( has_post_thumbnail() ) : ?>
      <div class="entry-iv__photo"><?php the_post_thumbnail( 'large' ); ?></div>
      <?php endif; ?>

      <div class="entry-iv__profile">
        <?php if ( $dept && ! is_wp_error( $dept ) ) : ?>
          <p class="entry-iv__dept"><?php echo esc_html( $dept[0]->name ); ?></p>
        <?php endif; ?>
        <?php if ( $role ) : ?>
          <p style="font-size:.875rem;color:var(--color-muted)"><?php echo esc_html( $role ); ?></p>
        <?php endif; ?>
        <h1 class="entry-iv__name"><?php the_title(); ?></h1>
        <?php if ( $year || $jtype ) : ?>
          <p class="entry-iv__sub">
            <?php if ( $year ) echo esc_html( $year ) . '年'; ?>
            <?php if ( $jtype && isset( $jtype_map[ $jtype ] ) ) echo esc_html( $jtype_map[ $jtype ] ); ?>
            <?php if ( $location && ! is_wp_error( $location ) ) echo ' ／ ' . esc_html( $location[0]->name ); ?>
          </p>
        <?php endif; ?>
        <?php if ( $copy ) : ?>
          <p class="entry-iv__copy"><?php echo esc_html( $copy ); ?></p>
        <?php endif; ?>
      </div>
    </div>

    <!-- インタビュー Q&A -->
    <?php if ( $qa ) : ?>
    <section class="entry-iv__section">
      <h2 class="entry-iv__section-title">インタビュー</h2>
      <?php foreach ( $qa as $item ) : ?>
      <div class="qa-item">
        <p class="qa-item__q"><?php echo esc_html( $item['question'] ); ?></p>
        <p class="qa-item__a"><?php echo nl2br( esc_html( $item['answer'] ) ); ?></p>
      </div>
      <?php endforeach; ?>
    </section>
    <?php endif; ?>

    <!-- 1日のスケジュール -->
    <?php if ( $schedule ) : ?>
    <section class="entry-iv__section">
      <h2 class="entry-iv__section-title">1日のスケジュール</h2>
      <table class="schedule-table">
        <?php foreach ( $schedule as $item ) : ?>
        <tr>
          <td><?php echo esc_html( $item['time'] ); ?></td>
          <td><?php echo esc_html( $item['content'] ); ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </section>
    <?php endif; ?>

    <!-- 関連する募集職種 -->
    <?php if ( $rel_jobs ) :
      $job_posts = array();
      foreach ( (array) $rel_jobs as $jid ) {
          $j = get_post( intval( $jid ) );
          if ( $j && $j->post_status === 'publish' ) {
              $job_posts[] = $j;
          }
      }
      if ( $job_posts ) :
    ?>
    <section class="entry-iv__section">
      <h2 class="entry-iv__section-title">関連する募集職種</h2>
      <div class="job-grid">
        <?php foreach ( $job_posts as $job ) :
          $j_open  = function_exists( 'get_field' ) ? get_field( 'field_job_is_open', $job->ID ) : true;
          $j_htype = function_exists( 'get_field' ) ? get_field( 'field_job_hiring_type', $job->ID ) : '';
          $j_dept  = get_the_terms( $job->ID, 'department' );
          $type_map = array( 'new_grad' => '新卒採用', 'career' => 'キャリア採用' );
        ?>
        <article class="job-card">
          <div class="job-card__body">
            <div class="job-card__tags">
              <?php if ( $j_dept && ! is_wp_error( $j_dept ) ) : ?>
                <span class="job-card__tag"><?php echo esc_html( $j_dept[0]->name ); ?></span>
              <?php endif; ?>
              <?php if ( $j_htype && isset( $type_map[ $j_htype ] ) ) : ?>
                <span class="job-card__tag"><?php echo esc_html( $type_map[ $j_htype ] ); ?></span>
              <?php endif; ?>
              <?php if ( ! $j_open ) : ?>
                <span class="job-card__tag job-card__tag--closed">募集終了</span>
              <?php endif; ?>
            </div>
            <h3 class="job-card__title"><?php echo esc_html( $job->post_title ); ?></h3>
            <p class="job-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $job->ID ), 35 ) ); ?></p>
          </div>
          <div class="job-card__footer">
            <a href="<?php echo esc_url( get_permalink( $job->ID ) ); ?>">詳しく見る →</a>
            <?php if ( ! $j_open ) : ?>
              <span class="badge-closed">募集終了</span>
            <?php else : ?>
              <span class="badge-open">募集中</span>
            <?php endif; ?>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; endif; ?>

    <div style="margin-top:2.5rem;text-align:center">
      <a href="<?php echo esc_url( home_url( '/people/' ) ); ?>" class="btn btn-outline-teal">← 働く人一覧に戻る</a>
    </div>

  </article>

  <?php endif; ?>
</div>

<?php get_footer(); ?>

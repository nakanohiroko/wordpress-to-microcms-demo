<?php get_header(); ?>

<div class="container page-inner">
  <?php if ( have_posts() ) : the_post();
    $is_open    = function_exists( 'get_field' ) ? get_field( 'field_job_is_open' ) : true;
    $h_type     = function_exists( 'get_field' ) ? get_field( 'field_job_hiring_type' ) : '';
    $e_type     = function_exists( 'get_field' ) ? get_field( 'field_job_employment_type' ) : '';
    $job_cat    = function_exists( 'get_field' ) ? get_field( 'field_job_job_category' ) : '';
    $desc       = function_exists( 'get_field' ) ? get_field( 'field_job_description' ) : '';
    $req        = function_exists( 'get_field' ) ? get_field( 'field_job_required_skills' ) : array();
    $pref       = function_exists( 'get_field' ) ? get_field( 'field_job_preferred_skills' ) : array();
    $salary     = function_exists( 'get_field' ) ? get_field( 'field_job_salary' ) : '';
    $hours      = function_exists( 'get_field' ) ? get_field( 'field_job_working_hours' ) : '';
    $deadline   = function_exists( 'get_field' ) ? get_field( 'field_job_deadline' ) : '';
    $related    = function_exists( 'get_field' ) ? get_field( 'field_job_related_people' ) : array();
    $dept       = get_the_terms( get_the_ID(), 'department' );
    $location   = get_the_terms( get_the_ID(), 'work_location' );

    $type_map   = array( 'new_grad' => '新卒採用', 'career' => 'キャリア採用' );
    $e_map      = array( 'fulltime' => '正社員', 'contract' => '契約社員' );
    $cat_map    = array( 'engineering' => '技術系', 'business' => '事務・営業系' );
  ?>

  <article class="entry-job">
    <header class="entry-job__header">
      <?php if ( ! $is_open ) : ?>
        <span class="badge-closed">募集終了</span>
      <?php else : ?>
        <span class="badge-open">募集中</span>
      <?php endif; ?>

      <h1 class="entry-job__title"><?php the_title(); ?></h1>

      <div class="entry-job__meta">
        <?php if ( $dept && ! is_wp_error( $dept ) ) : ?>
          <span class="entry-job__meta-item"><strong>部署</strong><?php echo esc_html( $dept[0]->name ); ?></span>
        <?php endif; ?>
        <?php if ( $h_type ) : ?>
          <span class="entry-job__meta-item"><strong>採用区分</strong><?php echo esc_html( $type_map[ $h_type ] ?? $h_type ); ?></span>
        <?php endif; ?>
        <?php if ( $e_type ) : ?>
          <span class="entry-job__meta-item"><strong>雇用形態</strong><?php echo esc_html( $e_map[ $e_type ] ?? $e_type ); ?></span>
        <?php endif; ?>
        <?php if ( $location && ! is_wp_error( $location ) ) : ?>
          <span class="entry-job__meta-item"><strong>勤務地</strong><?php echo esc_html( $location[0]->name ); ?></span>
        <?php endif; ?>
      </div>
    </header>

    <table class="entry-job__table">
      <?php if ( $desc ) : ?>
      <tr>
        <th>仕事内容</th>
        <td><?php echo wp_kses_post( $desc ); ?></td>
      </tr>
      <?php endif; ?>

      <?php if ( $req ) : ?>
      <tr>
        <th>必須スキル・経験</th>
        <td>
          <ul>
            <?php foreach ( $req as $item ) : ?>
              <li><?php echo esc_html( $item['text'] ); ?></li>
            <?php endforeach; ?>
          </ul>
        </td>
      </tr>
      <?php endif; ?>

      <?php if ( $pref ) : ?>
      <tr>
        <th>歓迎スキル・経験</th>
        <td>
          <ul>
            <?php foreach ( $pref as $item ) : ?>
              <li><?php echo esc_html( $item['text'] ); ?></li>
            <?php endforeach; ?>
          </ul>
        </td>
      </tr>
      <?php endif; ?>

      <?php if ( $salary ) : ?>
      <tr>
        <th>給与</th>
        <td><?php echo nl2br( esc_html( $salary ) ); ?></td>
      </tr>
      <?php endif; ?>

      <?php if ( $hours ) : ?>
      <tr>
        <th>勤務時間</th>
        <td><?php echo esc_html( $hours ); ?></td>
      </tr>
      <?php endif; ?>

      <?php if ( $deadline ) : ?>
      <tr>
        <th>応募締切</th>
        <td><?php echo esc_html( $deadline ); ?></td>
      </tr>
      <?php endif; ?>
    </table>

    <?php if ( $related ) : ?>
    <section class="related-section">
      <h2 class="related-section__title">この職種で働く先輩社員</h2>
      <?php
      $people_posts = array();
      foreach ( (array) $related as $pid ) {
          $p = get_post( intval( $pid ) );
          if ( $p && $p->post_status === 'publish' ) {
              $people_posts[] = $p;
          }
      }
      ?>
      <?php if ( $people_posts ) : ?>
      <div class="people-grid">
        <?php foreach ( $people_posts as $person ) :
          $thumb_id  = get_post_thumbnail_id( $person->ID );
          $dept_term = get_the_terms( $person->ID, 'department' );
          $catchcopy = function_exists( 'get_field' ) ? get_field( 'field_iv_catchcopy', $person->ID ) : '';
        ?>
        <a href="<?php echo esc_url( get_permalink( $person->ID ) ); ?>" class="person-card">
          <?php if ( $thumb_id ) : ?>
          <div class="person-card__img"><?php echo wp_get_attachment_image( $thumb_id, 'medium' ); ?></div>
          <?php endif; ?>
          <div class="person-card__body">
            <p class="person-card__name"><?php echo esc_html( $person->post_title ); ?></p>
            <?php if ( $dept_term && ! is_wp_error( $dept_term ) ) : ?>
              <p class="person-card__dept"><?php echo esc_html( $dept_term[0]->name ); ?></p>
            <?php endif; ?>
            <?php if ( $catchcopy ) : ?>
              <p class="person-card__copy"><?php echo esc_html( $catchcopy ); ?></p>
            <?php endif; ?>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </section>
    <?php endif; ?>

    <?php if ( $is_open ) : ?>
    <div class="entry-job__cta">
      <h3>この職種に応募する</h3>
      <a href="<?php echo esc_url( home_url( '/entry/' ) ); ?>" class="btn btn-primary">エントリーフォームへ</a>
    </div>
    <?php endif; ?>

    <div style="margin-top:2.5rem;text-align:center">
      <a href="<?php echo esc_url( home_url( '/jobs/' ) ); ?>" class="btn btn-outline-teal">← 募集職種一覧に戻る</a>
    </div>
  </article>

  <?php endif; ?>
</div>

<?php get_footer(); ?>

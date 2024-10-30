<?php
/*
  *
  * Template Name: Home Page
  *
  */
get_header(); ?>

<main>
  <!-- Hero -->
  <section class="hero-home">
    <div class="hero-image-box">
      <?php
      $image_hero = get_field('immagine_hero');
      if (!empty($image_hero)): ?>
        <img src="<?php echo esc_url($image_hero['url']); ?>" alt="<?php echo esc_attr($image_hero['alt']); ?>" />
      <?php endif; ?>
      <h1 class="hero-title title-3"><?php echo esc_html(get_field('titolo_hero')); ?></h1>
    </div>
    <div class="hero-banner">
      <div class="container">
        <h2 class="banner-text title-2"><?php echo esc_html(get_field('banner_hero')); ?></h2>
      </div>
    </div>

  </section>
  <!-- Sezione News -->
  <section class="news-home">
    <div class="news-title">
      <h3 class="bold"><?php echo esc_html(get_field('titolo_notizie')); ?></h3>
    </div>

    <?php
    $args = array(
      'post_type' => 'post',
      'meta_query' => array(
        array(
          'key' => 'in_evidenza_home',
          'value' => '1',
          'compare' => '=='
        )
      ),
      'posts_per_page' => 9
    );
    $featured_query = new WP_Query($args);

    if ($featured_query->have_posts()) : ?>
      <ul class="news-loop container">
        <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <div class="post-img">
                <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
              </div>
              <div class="post-title title-3 bold">
                <?php the_title(); ?>
              </div>
              <span class="post-type text-body">
                <?php echo get_field('sottotitolo'); ?>
              </span>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>Nessun contenuto in evidenza.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
  </section>
  <!-- Repeater Content -->
  <?php get_template_part('/template-parts/page-content'); ?>
  <!-- Sezione Calendario -->
  <section class="calendario-home">
    <div class="calendario-title">
      <h3 class="bold"><?php echo esc_html(get_field('titolo_calendario')); ?></h3>
    </div>

    <?php
    $args = array(
      'post_type' => 'eventi',
      'meta_query' => array(
        array(
          'key' => 'in_evidenza_home',
          'value' => '1',
          'compare' => '=='
        )
      ),
      'posts_per_page' => 9
    );
    $calendario_query = new WP_Query($args);

    if ($calendario_query->have_posts()) : ?>
      <ul class="calendario-loop container">
        <?php while ($calendario_query->have_posts()) : $calendario_query->the_post();

          $date_inizio = get_field('data_evento_inizio');
          $date_fine = get_field('data_evento_fine');
        ?>

          <li>
            <a href="<?php the_permalink(); ?>">
              <?php if ($date_inizio) : ?>
                <div class="event-date title-4 bold">

                  <?php if ($date_fine) : ?>
                    <span>
                      <?php
                      echo substr($date_inizio, 0, -5) . ' - ' . substr($date_fine, 0, -5);
                      ?>
                    </span>
                  <?php else : ?>
                    <span>
                      <?php
                      echo substr($date_inizio, 0, -5);
                      ?>
                    </span>
                  <?php endif; ?>

                </div>
              <?php endif; ?>

              <div class="post-img">
                <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
              </div>
              <div class="post-title title-2 bold">
                <?php the_title(); ?>
              </div>
              <span class="post-subtitle text-body">
                <?php echo get_field('sottotitolo'); ?>
              </span>

              <span class="post-divider"></span>

              <span class="post-info text-body">
                <?php echo get_field('luogo_evento') ?>
              </span>

              <?php if ($date_inizio) : ?>
                <div class="post-info text-body">

                  <?php if ($date_fine) : ?>
                    <span>
                      Dal <?php echo $date_inizio ?> al <?php echo $date_fine ?>
                    </span>
                  <?php else : ?>
                    <span>
                      Il <?php echo $date_inizio ?>
                    </span>
                  <?php endif; ?>

                </div>
              <?php endif; ?>

              <span class="post-info text-body">
                <?php echo get_field('ore') ?>
              </span>

              <span class="plus">+</span>
            </a>
          </li>

          <?php wp_reset_postdata(); ?>
      <?php endwhile;
      endif; ?>
      </ul>
      </div>

  </section>
</main>

<?php get_footer(); ?>
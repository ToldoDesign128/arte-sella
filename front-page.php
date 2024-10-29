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
  <!-- Repeater Content -->
  <?php get_template_part('/template-parts/page-content'); ?>
</main>

<?php get_footer(); ?>
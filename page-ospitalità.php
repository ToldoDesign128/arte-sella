<?php
/*
  *
  * Template Name: Ospitalità
  *
  */
get_header(); ?>

<main>
  <!-- Hero page -->
  <?php get_template_part('/template-parts/hero-page'); ?>
  <!-- Page content repeater -->
  <?php get_template_part('/template-parts/page-content'); ?>
  <!-- Page content ospitalita -->
  <section class="ospitalita">
    <?php /* Loop eventi */

    $custom_loop = new WP_Query(array(
      'post_type'     => 'struttura',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
    )); ?>

    <div class="loop-ospitalita container">
      <ul>
        <?php if ($custom_loop->have_posts()) : while ($custom_loop->have_posts()) : $custom_loop->the_post(); ?>

            <li>
              <a href="<?php the_permalink(); ?>">
                <div class="post-img">
                  <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                </div>
                <div class="post-title title-2 bold">
                  <?php the_title(); ?>
                </div>
                <span class="post-subtitle text-body">
                  <?php echo get_field('sottotitolo'); ?>
                </span>
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
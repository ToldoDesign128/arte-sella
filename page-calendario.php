<?php
/*
  *
  * Template Name: Calendario
  *
  */
get_header(); ?>

<main>
  <!-- Hero page -->
  <?php get_template_part('/template-parts/hero-page'); ?>
  <!-- Page content repeater -->
  <?php get_template_part('/template-parts/page-content'); ?>
  <!-- Page content calendario -->
  <section class="calendario">
    <?php /* Loop eventi */

    $custom_loop = new WP_Query(array(
      'post_type'     => 'eventi',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
    )); ?>

    <div class="loop-eventi container">
      <ul>
        <?php if ($custom_loop->have_posts()) : while ($custom_loop->have_posts()) : $custom_loop->the_post();

            $date_inizio = get_field('data_evento_inizio');
            $date_fine = get_field('data_evento_fine');
        ?>

            <li>
              <a href="<?php the_permalink(); ?>">
                <?php if ($date_inizio) : ?>
                  <div class="event-date title-4 bold">

                    <?php if ($date_fine) : ?>
                      <span>
                        <?php echo $date_inizio ?> - <?php echo $date_fine ?>
                      </span>
                    <?php else : ?>
                      <span>
                        <?php echo $date_inizio ?>
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
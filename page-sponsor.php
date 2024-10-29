<?php
/*
  *
  * Template Name: Sponsor
  *
  */
get_header(); ?>

<main>
  <!-- Hero page -->
  <?php get_template_part('/template-parts/hero-page'); ?>
  <!-- Page content repeater -->
  <?php get_template_part('/template-parts/page-content'); ?>
  <!-- Page content sponsor -->
  <section class="sponsor">
    <?php
    // Recupera tutte le categorie associate al post type 'sponsor'
    $categories = get_terms(array(
      'taxonomy' => 'sponsor_tax', // Modifica con la tassonomia corretta se diversa
      'hide_empty' => true
    ));

    if (!empty($categories) && !is_wp_error($categories)) :
      foreach ($categories as $category) : ?>

        <div class="category-section container">
          <h2 class="category-title title-2"><?php echo esc_html($category->name); ?></h2>

          <?php
          // Loop per i post della categoria corrente
          $sponsor_loop = new WP_Query(array(
            'post_type' => 'sponsor',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'tax_query' => array(
              array(
                'taxonomy' => 'sponsor_tax', // Modifica con la tassonomia corretta se diversa
                'field' => 'term_id',
                'terms' => $category->term_id,
              ),
            ),
          )); ?>

          <div class="loop-sponsor">
            <ul>
              <?php if ($sponsor_loop->have_posts()) : while ($sponsor_loop->have_posts()) : $sponsor_loop->the_post(); ?>

                  <?php
                  $sponsor_link = get_field('link_sponsor');

                  // Verifica se il campo $sponsor_link è compilato
                  if ($sponsor_link) :
                    $sponsor_link_url = $sponsor_link['url'];
                    $sponsor_link_title = $sponsor_link['title'];
                    $sponsor_link_target = $sponsor_link['target'] ? $sponsor_link['target'] : '_self';
                  ?>

                    <li>
                      <a href="<?php echo esc_url($sponsor_link_url); ?>" target="<?php echo esc_attr($sponsor_link_target); ?>">
                        <div class="post-img">
                          <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                        </div>
                        <div class="post-title title-2 bold">
                          <?php the_title(); ?>
                        </div>
                        <span class="post-subtitle text-body">
                          <?php echo esc_html(get_field('sottotitolo')); ?>
                        </span>
                      </a>
                    </li>

                  <?php else : ?>

                    <li>
                      <div class="post-img">
                        <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                      </div>
                      <div class="post-title title-2 bold">
                        <?php the_title(); ?>
                      </div>
                      <span class="post-subtitle text-body">
                        <?php echo esc_html(get_field('sottotitolo')); ?>
                      </span>
                    </li>

                  <?php endif; ?>

                <?php endwhile;
                wp_reset_postdata(); ?>
              <?php else : ?>
                <p><?php _e('Nessun post disponibile in questa categoria.'); ?></p>
              <?php endif; ?>
            </ul>

          </div>

        </div>

    <?php endforeach;
    endif; ?>
  </section>


</main>

<?php get_footer(); ?>
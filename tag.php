<?php
/*
  *
  * Template Name: Archivio Generale
  *
  */

get_header(); ?>

<main class="archive">

    <!-- Hero page -->
    <?php get_template_part('/template-parts/hero-page'); ?>

    <!-- Sezione barra di ricerca -->
    <section class="search-bar container">
        <h2 class="title-2">Cerca contenuti</h2>
        <form id="ajax-search-form" method="GET">
            <input type="text" name="s" id="search-input" placeholder="Cerca...">
            <button type="submit">Cerca</button>
        </form>
    </section>

    <!-- Sezione risultati della ricerca -->
    <section id="search-results" class="container">
        <h2>Risultati della ricerca</h2>
        <div id="results-container"></div>
    </section>


    <!-- Sezione anteprime per tag -->
    <section class="tag-previews container">
        <h2 class="title-1">Contenuti per tag</h2>
        <?php
        // Recupera i tag selezionati con ACF
        $selected_tags = get_field('filtro_tag_archivio'); // Sostituisci 'acf_field_name' con il nome del tuo campo ACF

        if ($selected_tags) :
            foreach ($selected_tags as $tag) :
                $tag_link = get_tag_link($tag->term_id);
                $args = array(
                    'post_type' => array('post', 'opere', 'eventi', 'sponsor'),
                    'tag_id' => $tag->term_id,
                    'posts_per_page' => 5 // Limita i post mostrati
                );
                $tag_query = new WP_Query($args);
                if ($tag_query->have_posts()) : ?>
                    <div class="tag-container">
                        <h3><?php echo esc_html($tag->name); ?></h3>
                        <ul>
                            <?php while ($tag_query->have_posts()) : $tag_query->the_post(); ?>
                                <li>
                                    <div class="img-box">
                                        <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                                    </div>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <span class="content-type">
                                        <?php echo get_content_type_label(get_post_type()); ?>
                                    </span>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
        <?php
                endif;
                wp_reset_postdata();
            endforeach;
        else :
            echo '<p>Nessun tag selezionato.</p>';
        endif;
        ?>
    </section>


    <!-- Sezione contenuti in evidenza -->
    <section class="featured-content container">
        <h2>Contenuti in evidenza</h2>

        <?php
        $args = array(
            'post_type' => array('post', 'opere', 'eventi', 'sponsor'),
            'meta_query' => array(
                array(
                    'key' => 'in_evidenza_archivio',
                    'value' => '1',
                    'compare' => '=='
                )
            ),
            'posts_per_page' => 5
        );
        $featured_query = new WP_Query($args);

        if ($featured_query->have_posts()) : ?>
            <ul>
                <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                    <li>
                        <div class="img-box">
                            <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                        </div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="content-type">
                            <?php echo get_content_type_label(get_post_type()); ?>
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>Nessun contenuto in evidenza.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>
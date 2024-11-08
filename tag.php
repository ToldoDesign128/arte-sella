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

        <!-- Sezione tag -->
        <div class="tags-filter">
            <?php
            // Recupera i tag selezionati nel campo ACF 'filtro_tag_archivio'
            $selected_tags = get_field('filtro_tag_archivio');

            if ($selected_tags) {
                $tag_ids = wp_list_pluck($selected_tags, 'term_id'); // Ottieni solo gli ID dei tag
            } else {
                $tag_ids = []; // Nessun tag selezionato
            }

            if ($selected_tags) :
                echo '<ul class="tag-list">';
                // Aggiungi l'elemento 'Tutti' che reindirizza all'URL della pagina corrente
                echo '<li><a href="' . esc_url(get_permalink()) . '" class="tag-filter">Tutti</a></li>';

                // Stampa i tag
                foreach ($selected_tags as $tag) :
                    echo '<li><a href="#" class="tag-filter" data-tag-id="' . esc_attr($tag->term_id) . '">' . esc_html($tag->name) . '</a></li>';
                endforeach;
                echo '</ul>';
            else :
                echo '<p>Nessun tag disponibile.</p>';
            endif;
            ?>
        </div>

        <!-- Sezione post, opere, eventi -->
        <div class="filtered-content">

            <!-- Container Post -->
            <div class="post-container">
                <h3 class="title-2 bold">News</h3>
                <ul class="post-list">
                    <?php
                    // Mostra tutti i post di default
                    $args_post = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'tag__in' => $tag_ids ?: null // Carica tutti i post se non ci sono tag selezionati
                    );
                    $post_query = new WP_Query($args_post);
                    if ($post_query->have_posts()) :
                        while ($post_query->have_posts()) : $post_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="post-img"><?php the_post_thumbnail('large'); ?></div>
                                    <p class="post-title title-4 bold"><?php the_title(); ?></p>
                                    <span class="post-type text-body">
                                        <?php echo get_field('sottotitolo'); ?>
                                    </span>
                                </a>
                            </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>Nessun post trovato.</p>';
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Container Opere -->
            <div class="opere-container">
                <h3 class="title-2 bold">Opere</h3>
                <ul class="opere-list">
                    <?php
                    $args_opere = array(
                        'post_type' => 'opere',
                        'posts_per_page' => -1,
                        'tag__in' => $tag_ids ?: null // Carica tutte le opere se non ci sono tag selezionati
                    );

                    $opere_query = new WP_Query($args_opere);
                    if ($opere_query->have_posts()) :
                        while ($opere_query->have_posts()) : $opere_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="post-img"><?php the_post_thumbnail('large'); ?></div>
                                    <p class="post-title title-4 bold"><?php the_title(); ?></p>
                                    <span class="post-type text-body">
                                        <?php echo get_field('sottotitolo'); ?>
                                    </span>

                                    <?php
                                    $author = get_field('autore_opera');
                                    $year = get_field('anno_opera');
                                    if ($author && $year) : ?>
                                        <div class="author-box">
                                            <span class="author title-2 text-body">
                                                <?php echo $author ?>, <?php echo $year ?>
                                            </span>
                                        </div>
                                    <?php endif ?>
                                </a>
                            </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>Nessuna opera trovata.</p>';
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Container Eventi -->
            <div class="eventi-container">
                <h3 class="title-2 bold">Eventi</h3>
                <ul class="eventi-list">
                    <?php
                    $args_eventi = array(
                        'post_type' => 'eventi',
                        'posts_per_page' => -1,
                        'tag__in' => $tag_ids ?: null // Carica tutti gli eventi se non ci sono tag selezionati
                    );

                    $eventi_query = new WP_Query($args_eventi);
                    if ($eventi_query->have_posts()) :
                        while ($eventi_query->have_posts()) : $eventi_query->the_post();

                            $date_inizio = get_field('data_evento_inizio');
                            $date_fine = get_field('data_evento_fine');
                    ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ($date_inizio) : ?>
                                        <div class="event-date title-4 bold">
                                            <?php if ($date_fine) : ?>
                                                <span>
                                                    <?php echo substr($date_inizio, 0, -5) . ' - ' . substr($date_fine, 0, -5); ?>
                                                </span>
                                            <?php else : ?>
                                                <span>
                                                    <?php echo substr($date_inizio, 0, -5); ?>
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
                                                <span>Dal <?php echo $date_inizio ?> al <?php echo $date_fine ?></span>
                                            <?php else : ?>
                                                <span>Il <?php echo $date_inizio ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <span class="post-info text-body">
                                        <?php echo get_field('ore') ?>
                                    </span>

                                    <span class="plus">+</span>
                                </a>
                            </li>
                    <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>Nessun evento trovato.</p>';
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
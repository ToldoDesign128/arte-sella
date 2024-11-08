<?php

// Ricerca con Ajax
function ajax_search()
{
    $search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // Argomenti della query di ricerca
    $args = array(
        'post_type' => array('post', 'opere', 'eventi', 'sponsor'), // Custom post types
        's' => $search_term,
        'posts_per_page' => -1
    );

    $search_query = new WP_Query($args);

    if ($search_query->have_posts()) {
        echo '<ul class="search-result">';
        while ($search_query->have_posts()) {
            $search_query->the_post();
            echo '<li class="search-result-item">';
            echo '<a href="' . get_permalink() . '">';
            echo '<p class="post-title">' . get_the_title() . '</p>';
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Nessun contenuto trovato per "' . esc_html($search_term) . '".</p>';
    }

    wp_die(); // Termina l'esecuzione dello script
}

add_action('wp_ajax_ajax_search', 'ajax_search'); // Per utenti loggati
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search'); // Per utenti non loggati


// Filtraggio Tag
function filter_posts_by_tag()
{
    // Recupera il tag selezionato dal frontend tramite AJAX
    $tag_id = isset($_POST['tag_id']) ? intval($_POST['tag_id']) : 0;

    // Recupera i tag selezionati tramite ACF
    $selected_tags = get_field('filtro_tag_archivio', 'option'); // Se hai impostato il campo in un'opzione del tema
    $tag_ids = wp_list_pluck($selected_tags, 'term_id'); // Ottieni gli ID dei tag

    if ($tag_id != 0) {
        $tag_ids[] = $tag_id; // Aggiungi il tag selezionato via AJAX
    }

    $post_types = array('post', 'opere', 'eventi'); // Elenco dei post types da filtrare

    echo '<div class="filtered-content">';

    foreach ($post_types as $post_type) {
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => 9,
            'tag__in' => $tag_ids // Filtra i post con i tag selezionati
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="' . $post_type . '-container">';

            // Modifica del titolo per "Post" (News)
            if ($post_type == 'post') {
                echo '<h3 class="title-2 bold">News</h3>';
            } else {
                echo '<h3 class="title-2 bold">' . ucfirst($post_type) . '</h3>';
            }

            echo '<ul class="' . $post_type . '-list">';

            while ($query->have_posts()) {
                $query->the_post();
                echo '<li>';
                echo '<a href="' . get_permalink() . '">';
                echo '<div class="post-img">' . get_the_post_thumbnail(get_the_ID(), 'large') . '</div>';
                echo '<p class="post-title title-4 bold">' . get_the_title() . '</p>';
                echo '<span class="post-type text-body">' . get_field('sottotitolo') . '</span>';

                if ($post_type == 'opere') {
                    $author = get_field('autore_opera');
                    $year = get_field('anno_opera');
                    if ($author && $year) {
                        echo '<div class="author-box">';
                        echo '<span class="author title-2 text-body">' . $author . ', ' . $year . '</span>';
                        echo '</div>';
                    }
                }

                if ($post_type == 'eventi') {
                    $date_inizio = get_field('data_evento_inizio');
                    $date_fine = get_field('data_evento_fine');
                    if ($date_inizio) {
                        echo '<div class="event-date title-4 bold">';
                        if ($date_fine) {
                            echo '<span>' . substr($date_inizio, 0, -5) . ' - ' . substr($date_fine, 0, -5) . '</span>';
                        } else {
                            echo '<span>' . substr($date_inizio, 0, -5) . '</span>';
                        }
                        echo '</div>';
                    }
                    echo '<span class="post-info text-body">' . get_field('luogo_evento') . '</span>';
                    echo '<span class="post-info text-body">' . get_field('ore') . '</span>';
                }

                echo '</a>';
                echo '</li>';
            }
            echo '</ul></div>';
        } else {
            echo '<p>Nessun contenuto trovato.</p>';
        }
        wp_reset_postdata();
    }

    echo '</div>';

    wp_die(); // Termina l'esecuzione dello script
}

add_action('wp_ajax_filter_posts_by_tag', 'filter_posts_by_tag');
add_action('wp_ajax_nopriv_filter_posts_by_tag', 'filter_posts_by_tag');

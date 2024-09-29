<?php 

function ajax_search() {
    $search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

    // Argomenti della query di ricerca
    $args = array(
        'post_type' => array('post', 'opere', 'eventi', 'sponsor'), // Aggiungi i tuoi CPT
        's' => $search_term,
        'posts_per_page' => -1
    );

    $search_query = new WP_Query($args);

    if ($search_query->have_posts()) :
        echo '<ul>';
        while ($search_query->have_posts()) : $search_query->the_post();
            ?>
            <li>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </li>
            <?php
        endwhile;
        echo '</ul>';
    else :
        echo '<p>Nessun contenuto trovato per "' . esc_html($search_term) . '".</p>';
    endif;

    wp_die(); // Importante per terminare l'esecuzione dello script
}
add_action('wp_ajax_ajax_search', 'ajax_search'); // Per utenti loggati
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search'); // Per utenti non loggati

?>
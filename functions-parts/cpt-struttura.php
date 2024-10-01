<?php
/*Replace = struttura*/

function struttura()
{
    register_post_type(
        'struttura',
        array(
            'labels'                => array(
                'name'              => 'Struttura',
                'singular_name'     => 'Struttura',
                'all_items'         => 'Tutte le Strutture',
                'add_new'           => 'Aggiungi una nuova Struttura',
                'add_new_item'      => 'Aggiungi una nuova Struttura',
                'edit_item'         => 'Modifica Struttura',
                'new_item'          => 'Nuovo Struttura',
                'view_item'         => 'Visualizza Struttura',
                'search_items'      => 'Cerca',
                'not_found'         => 'Nessun elemento trovato',
                'not_found_in_trash'=> 'Nessun elemento nel cestino',
                'parent_item_colon' => '',
            ),
            'description'           => 'struttura',
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 23,
            'menu_icon'             => 'dashicons-plus-alt',
            'rewrite'               => array(
                'slug'              => 'struttura',
                'with-front'        => false,
            ),
            'has_archive'           => false,
            'taxonomies'            => array('post_tag', 'struttura_tax'), // Aggiungi 'post_tag'
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'show_in_rest'          => false, // Gutemberg disattivato
            'supports'              => array('title', 'thumbnail', 'editor') // Aggiungi 'editor' se necessario
        )
    );
    flush_rewrite_rules(); // Sposta flush_rewrite_rules fuori dall'array
}
add_action('init', 'struttura');

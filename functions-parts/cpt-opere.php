<?php
/*Replace = opere*/

function opere()
{
    register_post_type(
        'opere',
        array(
            'labels'                => array(
                'name'              => 'Opere',
                'singular_name'     => 'Opera',
                'all_items'         => 'Tutte le Opere',
                'add_new'           => 'Aggiungi una nuova Opera',
                'add_new_item'      => 'Aggiungi una nuova Opera',
                'edit_item'         => 'Modifica Opera',
                'new_item'          => 'Nuova Opera',
                'view_item'         => 'Visualizza Opera',
                'search_items'      => 'Cerca',
                'not_found'         => 'Nessun elemento trovato',
                'not_found_in_trash'=> 'Nessun elemento nel cestino',
                'parent_item_colon' => '',
            ),
            'description'           => 'opere',
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 21,
            'menu_icon'             => 'dashicons-plus-alt',
            'rewrite'               => array(
                'slug'              => 'opere',
                'with-front'        => false,
            ),
            'has_archive'           => false,
            'taxonomies'            => array('post_tag', 'opere_tax'), // Aggiungi 'post_tag'
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'show_in_rest'          => false, // Gutemberg disattivato
            'supports'              => array('title', 'thumbnail') // Aggiungi 'editor' se necessario
        )
    );
    flush_rewrite_rules(); // Sposta flush_rewrite_rules fuori dall'array
}
add_action('init', 'opere');
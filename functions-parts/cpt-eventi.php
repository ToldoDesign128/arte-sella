<?php
/*Replace = eventi*/

function eventi()
{
    register_post_type(
        'eventi',
        array(
            'labels'                => array(
                'name'              => 'Eventi',
                'singular_name'     => 'Evento',
                'all_items'         => 'Tutti gli Eventi',
                'add_new'           => 'Aggiungi un nuovo Evento',
                'add_new_item'      => 'Aggiungi un nuovo Evento',
                'edit_item'         => 'Modifica Evento',
                'new_item'          => 'Nuovo Evento',
                'view_item'         => 'Visualizza Evento',
                'search_items'      => 'Cerca',
                'not_found'         => 'Nessun elemento trovato',
                'not_found_in_trash'=> 'Nessun elemento nel cestino',
                'parent_item_colon' => '',
            ),
            'description'           => 'eventi',
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 22,
            'menu_icon'             => 'dashicons-plus-alt',
            'rewrite'               => array(
                'slug'              => 'calendario',
                'with-front'        => false,
            ),
            'has_archive'           => false,
            'taxonomies'            => array('post_tag', 'eventi_tax'), // Aggiungi 'post_tag'
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'show_in_rest'          => false,
            'supports'              => array('title', 'thumbnail', 'editor') // Aggiungi 'editor' se necessario
        )
    );
    flush_rewrite_rules(); // Sposta flush_rewrite_rules fuori dall'array
}
add_action('init', 'eventi');
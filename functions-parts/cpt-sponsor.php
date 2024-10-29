<?php
/*Replace = sponsor*/

function sponsor()
{
    register_post_type(
        'sponsor',
        array(
            'labels'                => array(
                'name'              => 'Sponsor',
                'singular_name'     => 'Sponsor',
                'all_items'         => 'Tutti gli Sponsor',
                'add_new'           => 'Aggiungi un nuovo Sponsor',
                'add_new_item'      => 'Aggiungi un nuovo Sponsor',
                'edit_item'         => 'Modifica Sponsor',
                'new_item'          => 'Nuovo Sponsor',
                'view_item'         => 'Visualizza Sponsor',
                'search_items'      => 'Cerca',
                'not_found'         => 'Nessun elemento trovato',
                'not_found_in_trash'=> 'Nessun elemento nel cestino',
                'parent_item_colon' => '',
            ),
            'description'           => 'sponsor',
            'public'                => true,
            'publicly_queryable'    => true,
            'exclude_from_search'   => false,
            'show_ui'               => true,
            'query_var'             => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-plus-alt',
            'rewrite'               => array(
                'slug'              => 'sponsor',
                'with-front'        => false,
            ),
            'has_archive'           => false,
            'taxonomies'            => array('post_tag', 'sponsor_tax'), // Aggiungi 'post_tag'
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'show_in_rest'          => false, // Gutemberg disattivato
            'supports'              => array('title', 'thumbnail') // Aggiungi 'editor' se necessario
        )
    );
    flush_rewrite_rules(); // Sposta flush_rewrite_rules fuori dall'array
}
add_action('init', 'sponsor');

//aggiunta categorie
function sponsor_taxonomies()
{
    register_taxonomy(
        'sponsor_tax',
        'sponsor',
        array(
            'labels' => array(
                'name' => 'Categorie',
                'add_new_item' => 'Aggiungi nuova categoria',
                'new_item_name' => "Nuova categoria"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => true
        )
    );
}
add_action('init', 'sponsor_taxonomies', 0);

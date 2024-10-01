<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php $viewport_content = apply_filters('arte_sella_viewport_content', 'width=device-width, initial-scale=1'); ?>
    <meta name="viewport" content="<?php echo esc_attr($viewport_content); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#f3f4f6">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>" type="image/x-icon">

    <title>
        <?php
        if (is_front_page()) {
            bloginfo('name');
        } else {
            wp_title('');
        };
        ?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="container">
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',   // La tua posizione del menu
                'walker' => new My_Walker_Nav_Menu(),  // Il walker personalizzato
                'container' => false,            // Disattiva il div contenitore
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',  // Modifica l'output dell'elemento ul
            ));

            ?>
        </nav>
    </header>
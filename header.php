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

    <header>
        <div class="header">
            <div class="header-wrap">
                <a href="<?php echo home_url(); ?>" class="header-logo">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/artesella-logo.jpg'; ?>" alt="Logo">
                </a>
                <button id="hamburgerBtn" class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="header-panel">
                <div class="header-panel-int">
                    <div class="header-panel-btn">

                        <?php
                        $shop = get_field('link_shop','option');
                        if ($shop):
                            $shop_url = $shop['url'];
                            $shop_title = $shop['title'];
                            $shop_target = $shop['target'] ? $shop['target'] : '_self';
                        ?>
                            <a class="shop-link" href="<?php echo esc_url($shop_url); ?>" target="<?php echo esc_attr($shop_target); ?>">
                                <svg width="25px" height="25px" viewBox="0 0 32 32" id="i-bag" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M5 9 L5 29 27 29 27 9 Z M10 9 C10 9 10 3 16 3 22 3 22 9 22 9"></path>
                                    </g>
                                </svg>
                                <?php echo esc_html($shop_title); ?>
                            </a>
                        <?php endif; ?>

                        <button class="header-lang">EN</button>
                    </div>
                    <button id="hamburgerBtnClose" class="hamburger-close">
                        <span></span>
                        <span></span>
                    </button>
                </div>
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
                <div class="header-archive-box">
                    <?php
                    $archive = get_field('link_archivio','option');
                    if ($archive):
                        $archive_url = $archive['url'];
                        $archive_title = $archive['title'];
                        $archive_target = $archive['target'] ? $archive['target'] : '_self';
                    ?>
                        <a class="archive-link" href="<?php echo esc_url($archive_url); ?>" target="<?php echo esc_attr($archive_target); ?>"><?php echo esc_html($archive_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <div class="header-spacer"></div>
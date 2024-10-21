<?php 
    get_header();
    if (have_posts()){
        while(have_posts()){
            the_post();
            $title = get_the_title();
            $thumb_url = get_the_post_thumbnail_url();
            $author = get_field('autore_opera');
            $year = get_field('anno_opera');
        }
    }
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title">/ <?php echo $title?></h1>
            </div>
            <div class="row">
                <div class="col-auto">
                    <span class="subtitle">
                        <?php echo $author ?>, <?php echo $year ?>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12">
                    <?php 
                    // Check if 'contenuto_pagina' has rows of flexible content
                    if (have_rows('contenuto_pagina')) {
                        // Loop through each row of flexible content
                        while (have_rows('contenuto_pagina')) {
                            the_row();
                            
                            // Check the layout type and render content accordingly
                            if (get_row_layout() == 'blocco_100') { ?>
                            <div class="block-100">
                                <?php the_sub_field('testo_blocco_100'); // Example field for this layout ?>
                            </div>
                            <?php } elseif (get_row_layout() == 'immagine') {
                                $image = get_sub_field('immagine'); // Example image field
                                if ($image) {
                                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="img-fluid">';
                                }
                            }
                            // Add more 'elseif' cases for other layouts as needed
                        }
                    }
                    ?>
                </div>
            </div> -->
        </div>
    </div>
        <?php 
    // Check if 'contenuto_pagina' has rows of flexible content
    if (have_rows('contenuto_pagina')) {
        // Loop through each row of flexible content
        while (have_rows('contenuto_pagina')) {
            the_row();             
            // Check the layout type and render content accordingly
            if (get_row_layout() == 'blocco_100') { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="block-100">
                                <?php the_sub_field('testo_blocco_100'); // Example field for this layout ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif (get_row_layout() == 'sponsor_repeater') { 
                $sponsors = get_sub_field("selettore_sponsor"); ?>
                <div class="container">
                    <div class="sponsors">
                        <div class="row">
                            <?php foreach ($sponsors as $post): 
                                setup_postdata($post); ?>
                                <div class="col-3">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" width="100%">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            <?php } elseif (get_row_layout() == 'linea_separatrice') { ?>
                <hr class="linea-separatrice">
            <?php } elseif (get_row_layout() == 'blocco_75_25') {
                if (have_rows('selettore_testoimmagine_75_25')) {
                    $first_item_set = false; // Flag to check if the first item is set
                    $second_content = ''; // Variable to store the second content
                    ?>
                    <div class="container ti">
                        <div class="row">
                            <?php 
                            // Initialize a counter to keep track of the order
                            $content_counter = 0;

                            while (have_rows('selettore_testoimmagine_75_25')) {
                                the_row();
                                
                                // Increment the counter for each item
                                $content_counter++;

                                // Determine column size based on the order
                                $col_class = ($content_counter == 1) ? 'col-9' : 'col-3';

                                // Check if it's an image layout
                                if (get_row_layout() == 'immagine_blocco_75_25') {
                                    $image = get_sub_field('immagine_blocco_75_25');
                                    if ($image) {
                                        if ($content_counter == 1) {
                                            // First item, mark as set and print immediately
                                            $first_item_set = true;
                                            ?>
                                            <div class="<?php echo esc_attr($col_class); ?>">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%">
                                            </div>
                                            <?php
                                        } else {
                                            // Second item, store the output
                                            $second_content = '<div class="' . esc_attr($col_class) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" width="100%"></div>';
                                        }
                                    }
                                }
                                
                                // Check if it's a text layout
                                elseif (get_row_layout() == 'testo_blocco_75_25') {
                                    $text = get_sub_field('testo_blocco_75_25');
                                    if ($text) {
                                        if ($content_counter == 1) {
                                            // First item, mark as set and print immediately
                                            $first_item_set = true;
                                            ?>
                                            <div class="<?php echo esc_attr($col_class); ?>">
                                                <?php echo wp_kses_post($text); ?>
                                            </div>
                                            <?php
                                        } else {
                                            // Second item, store the output
                                            $second_content = '<div class="' . esc_attr($col_class) . '">' . wp_kses_post($text) . '</div>';
                                        }
                                    }
                                }
                            }

                            // If the first item was not set, add an empty col-9
                            if (!$first_item_set) { ?>
                                <div class="col-9"></div>
                            <?php }

                            // Print the stored second content (either image or text)
                            echo $second_content;
                            ?>
                        </div>
                    </div>
                <?php }
            } elseif (get_row_layout() == 'immagine_100') {
                $image = get_sub_field('immagine_blocco_100'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-full">
                        </div>
                    </div>
                </div>
            <?php } elseif (get_row_layout() == 'separatore') {
                $separator_height = get_sub_field('seleziona_grandezza_separatore'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if ($separator_height == "Piccolo") { ?>
                                <div style="height:25px"></div>
                            <?php } elseif ($separator_height == "Medio") { ?>
                                <div style="height:50px"></div>
                            <?php } else {?>
                                <div style="height:100px"></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } elseif (get_row_layout() == 'collegamento_a_tag') {
                $post_tag_ids = get_sub_field('filtro_tag');
                if (!empty($post_tag_ids)) {
                    $args = array(
                        'post_type' => 'any',
                        'tag__in' => $post_tag_ids,
                        'posts_per_page' => -1,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) { ?>
                        <div class="container">
                            <div class="row">
                                <?php while ($query->have_posts()) {
                                    $query->the_post(); ?>
                                    <div class="col-12 col-md-4">
                                        <div class="related-posts mb-5">
                                            <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                <div class="img-date-container position-relative">
                                                    <?php if (get_field("data_evento")) { ?>
                                                    <div class="teaser-date">
                                                        <?php the_field("data_evento") ?>
                                                    </div>
                                                    <?php } ?>
                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                                                </div>
                                                <h3 class="mt-4 pb-5"><?php the_title(); ?></h3>
                                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata();
                }
            } elseif (get_row_layout() == 'blocco_50_50') {
                if (have_rows('selettore_testoimmagine_50_50')) {
                    $first_item_set = false; // Flag to check if the first item is set
                    $second_content = ''; // Variable to store the second content
                    ?>
                    <div class="container ti">
                        <div class="row">
                            <?php 
                            // Initialize a counter to keep track of the order
                            $content_counter = 0;

                            while (have_rows('selettore_testoimmagine_50_50')) {
                                the_row();
                                
                                // Increment the counter for each item
                                $content_counter++;

                                // Determine column size based on the order
                                $col_class = ($content_counter == 1) ? 'col-6' : 'col-6';

                                // Check if it's an image layout
                                if (get_row_layout() == 'immagine_blocco_50_50') {
                                    $image = get_sub_field('immagine_blocco_50_50');
                                    if ($image) {
                                        if ($content_counter == 1) {
                                            // First item, mark as set and print immediately
                                            $first_item_set = true;
                                            ?>
                                            <div class="<?php echo esc_attr($col_class); ?>">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%">
                                            </div>
                                            <?php
                                        } else {
                                            // Second item, store the output
                                            $second_content = '<div class="' . esc_attr($col_class) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" width="100%"></div>';
                                        }
                                    }
                                }
                                
                                // Check if it's a text layout
                                elseif (get_row_layout() == 'testo_blocco_50_50') {
                                    $text = get_sub_field('testo_blocco_50_50');
                                    if ($text) {
                                        if ($content_counter == 1) {
                                            // First item, mark as set and print immediately
                                            $first_item_set = true;
                                            ?>
                                            <div class="<?php echo esc_attr($col_class); ?>">
                                                <?php echo wp_kses_post($text); ?>
                                            </div>
                                            <?php
                                        } else {
                                            // Second item, store the output
                                            $second_content = '<div class="' . esc_attr($col_class) . '">' . wp_kses_post($text) . '</div>';
                                        }
                                    }
                                }
                            }

                            // If the first item was not set, add an empty col-9
                            if (!$first_item_set) { ?>
                                <div class="col-6"></div>
                            <?php }

                            // Print the stored second content (either image or text)
                            echo $second_content;
                            ?>
                        </div>
                    </div>
                <?php }
            } elseif (get_row_layout() == 'blocco_25_75') {
            if (have_rows('selettore_testoimmagine_25_75')) {
                $first_item_set = false; // Flag to check if the first item is set
                $second_content = ''; // Variable to store the second content
                ?>
                <div class="container ti">
                    <div class="row">
                        <?php 
                        // Initialize a counter to keep track of the order
                        $content_counter = 0;

                        while (have_rows('selettore_testoimmagine_25_75')) {
                            the_row();
                            
                            // Increment the counter for each item
                            $content_counter++;

                            // Determine column size based on the order
                            $col_class = ($content_counter == 1) ? 'col-3' : 'col-9';

                            // Check if it's an image layout
                            if (get_row_layout() == 'immagine_blocco_25_75') {
                                $image = get_sub_field('immagine_blocco_25_75');
                                if ($image) {
                                    // Debugging output to check if the image is being retrieved
                                    echo '<pre>'; print_r($image); echo '</pre>';

                                    if ($content_counter == 1) {
                                        // First item, mark as set and print immediately
                                        $first_item_set = true;
                                        ?>
                                        <div class="<?php echo esc_attr($col_class); ?>">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%">
                                        </div>
                                        <?php
                                    } else {
                                        // Second item, store the output
                                        $second_content = '<div class="' . esc_attr($col_class) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" width="100%"></div>';
                                    }
                                } else {
                                    // Debugging message if the image field is empty
                                    //echo '<p>Image field is empty or not set.</p>';
                                }
                            }
                            
                            // Check if it's a text layout
                            elseif (get_row_layout() == 'testo_blocco_25_75') {
                                $text = get_sub_field('testo_blocco_25_75');
                                if ($text) {
                                    if ($content_counter == 1) {
                                        // First item, mark as set and print immediately
                                        $first_item_set = true;
                                        ?>
                                        <div class="<?php echo esc_attr($col_class); ?>">
                                            <?php echo wp_kses_post($text); ?>
                                        </div>
                                        <?php
                                    } else {
                                        // Second item, store the output
                                        $second_content = '<div class="' . esc_attr($col_class) . '">' . wp_kses_post($text) . '</div>';
                                    }
                                }
                            }
                        }

                        // If the first item was not set, add an empty col-3
                        if (!$first_item_set) { ?>
                            <div class="col-3"></div>
                        <?php }

                        // Print the stored second content (either image or text)
                        echo $second_content;
                        ?>
                    </div>
                </div>
            <?php }
            } elseif (get_row_layout() == 'gallery') {
                $gallery = get_sub_field('gallery_item');
                if (!empty($gallery)) { ?>
                <div class="container">
                    <div class="swiper SwiperGallery">
                        <div class="swiper-wrapper" id="hgblu-gallery">
                            <?php foreach ($gallery as $img) { ?>
                                <div class="swiper-slide">
                                    <a data-fslightbox="gallery"  href="<?php echo$img['url']; ?>" data-pswp-width="<?php echo $img['width'] ?>" data-pswp-height="<?php echo $img['height'] ?>">
                                        <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" class="img-fluid">
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }
            } elseif (get_row_layout() == 'slider_testo_immagine') {
                $gallery = get_sub_field('testo_immagine_repeater');
                if (!empty($gallery)) { ?>
                <div class="container">
                    <div class="swiper SwiperTextImg">
                        <div class="swiper-wrapper" id="hgblu-gallery">
                            <?php foreach ($gallery as $slide) { ?>
                                <div class="swiper-slide">
                                    <div class="slide-text"><?php echo $slide['testo_repeater'] ?></div>
                                    <img src="<?php echo $slide['immagine_repeater']['url'] ?>" alt="<?php echo $slide['immagine_repeater']['alt'] ?>" class="img-fluid">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php }
            } elseif (get_row_layout() == 'blocco_33_33_33') {
    if (have_rows('selettore_testoimmagine_33_33_33')) {
        $first_item_set = false; // Flag to check if the first item is set
        $second_item_set = false; // Flag to check if the second item is set
        $second_content = ''; // Variable to store the second content
        $third_content = ''; // Variable to store the third content
        ?>
        <div class="container ti">
            <div class="row">
                <?php 
                // Initialize a counter to keep track of the order
                $content_counter = 0;

                while (have_rows('selettore_testoimmagine_33_33_33')) {
                    the_row();
                    
                    // Increment the counter for each item
                    $content_counter++;

                    // Set the column class for a three-column layout
                    $col_class = 'col-4';

                    // Check if it's an image layout
                    if (get_row_layout() == 'immagine_blocco_33_33_33') {
                        $image = get_sub_field('immagine_blocco_33_33_33');
                        if ($image) {
                            if ($content_counter == 1) {
                                // First item, mark as set and print immediately
                                $first_item_set = true;
                                ?>
                                <div class="<?php echo esc_attr($col_class); ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%">
                                </div>
                                <?php
                            } elseif ($content_counter == 2) {
                                // Second item, mark as set and store the output
                                $second_item_set = true;
                                $second_content = '<div class="' . esc_attr($col_class) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" width="100%"></div>';
                            } else {
                                // Third item, store the output
                                $third_content = '<div class="' . esc_attr($col_class) . '"><img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" width="100%"></div>';
                            }
                        }
                    }
                    
                    // Check if it's a text layout
                    elseif (get_row_layout() == 'testo_blocco_33_33_33') {
                        $text = get_sub_field('testo_blocco_33_33_33');
                        if ($text) {
                            if ($content_counter == 1) {
                                // First item, mark as set and print immediately
                                $first_item_set = true;
                                ?>
                                <div class="<?php echo esc_attr($col_class); ?>">
                                    <?php echo wp_kses_post($text); ?>
                                </div>
                                <?php
                            } elseif ($content_counter == 2) {
                                // Second item, mark as set and store the output
                                $second_item_set = true;
                                $second_content = '<div class="' . esc_attr($col_class) . '">' . wp_kses_post($text) . '</div>';
                            } else {
                                // Third item, store the output
                                $third_content = '<div class="' . esc_attr($col_class) . '">' . wp_kses_post($text) . '</div>';
                            }
                        }
                    }
                }

                // If the first item was not set, add an empty col-4
                if (!$first_item_set) { ?>
                    <div class="col-4"></div>
                <?php }

                // Print the stored second content if not already set
                if (!$second_item_set) { ?>
                    <div class="col-4"></div>
                <?php } else {
                    echo $second_content;
                }

                // Print the stored third content (either image or text)
                echo $third_content;
                ?>
            </div>
        </div>
    <?php }
}
        }
    } ?>
</main>

<?php get_footer(); ?>
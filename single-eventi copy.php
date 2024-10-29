<?php
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $thumb_url = get_the_post_thumbnail_url();
        $content = apply_filters('the_content', get_the_content());
        $subtitle = get_field('sottotitolo');
        $date = get_field('data_evento');
        $place = get_field('luogo_evento');
        $time = get_field('ore');
        $sponsors = get_field('sponsors');
    }
}
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title">/ <?php echo $title ?></h1>
            </div>
            <div class="col-12">
                <h2 class="secondary-title">
                    <?php echo $subtitle ?>
                </h2>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-auto">
                        <span class="subtitle">
                            <?php echo $date ?>
                        </span><br>
                        <span class="subtitle">
                            <?php echo $place ?>
                        </span><br>
                        <span class="subtitle">
                            <?php echo $time ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
            </div>
            <div class="col-12">
                <?php echo $content ?>
            </div>
            <!-- <div class="col-12">
                <?php
                // Ottieni i tag del post corrente
                $post_tags = get_the_tags();
                if ($post_tags) { ?>
                <div class="tags-group">
                    <?php foreach ($post_tags as $tag) { ?>
                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag">
                        <?php echo esc_html($tag->name); ?>
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
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
                                <?php the_sub_field('testo_blocco_100'); // Example field for this layout 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif (get_row_layout() == 'blocco_50_50') {
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
                                        echo '<pre>';
                                        print_r($image);
                                        echo '</pre>';

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
                                        <a data-fslightbox="gallery" href="<?php echo $img['url']; ?>" data-pswp-width="<?php echo $img['width'] ?>" data-pswp-height="<?php echo $img['height'] ?>">
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
    }
    ?>
</main>

<?php get_footer(); ?>
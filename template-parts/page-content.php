<?php
if (have_rows('contenuto_pagina')):
    while (have_rows('contenuto_pagina')) : the_row();

        // Blocco 100
        if (get_row_layout() == 'blocco_100'): ?>

            <section class="b-100 container">
                <div class="b-100__text">
                    <?php the_sub_field('testo_blocco_100'); ?>
                </div>
            </section>

        <?php
        // Immagine 100
        elseif (get_row_layout() == 'immagine_100'):
            $image_100 = get_sub_field('immagine_blocco_100'); ?>

            <section class="img-100 container">
                <img src="<?php echo esc_url($image_100['url']); ?>" alt="<?php echo esc_attr($image_100['alt']); ?>" />
            </section>

        <?php
        // Blocco 75 / 25
        elseif (get_row_layout() == 'blocco_75_25'): ?>

            <section class="b-75-25 container">

                <?php if (have_rows('selettore_testoimmagine_75_25')):

                    while (have_rows('selettore_testoimmagine_75_25')) : the_row();
                        // Blocco 100
                        if (get_row_layout() == 'testo_blocco_75_25'): ?>

                            <div class="b-75-25__col">
                                <div class="b-75-25__col__text">
                                    <?php the_sub_field('testo_blocco_75_25'); ?>
                                </div>
                            </div>

                        <?php
                        // Immagine 100
                        elseif (get_row_layout() == 'immagine_blocco_75_25'):

                            $image_75 = get_sub_field('immagine_blocco_75_25'); ?>

                            <div class="b-75-25__col">
                                <div class="b-75-25__col__img">
                                    <img src="<?php echo esc_url($image_75['url']); ?>" alt="<?php echo esc_attr($image_75['alt']); ?>" />
                                </div>
                            </div>

                <?php
                        endif;
                    endwhile;
                endif; ?>
            </section>


        <?php
        // Blocco 50 / 50
        elseif (get_row_layout() == 'blocco_50_50'): ?>

            <section class="b-50-50 container">

                <?php if (have_rows('selettore_testoimmagine_50_50')):

                    while (have_rows('selettore_testoimmagine_50_50')) : the_row();
                        // Blocco 100
                        if (get_row_layout() == 'testo_blocco_50_50'): ?>

                            <div class="b-50-50__col">
                                <div class="b-50-50__col__text">
                                    <?php the_sub_field('testo_blocco_50_50'); ?>
                                </div>
                            </div>

                        <?php
                        // Immagine 100
                        elseif (get_row_layout() == 'immagine_blocco_50_50'):

                            $image_50 = get_sub_field('immagine_blocco_50_50'); ?>

                            <div class="b-50-50__col">
                                <div class="b-50-50__col__img">
                                    <img src="<?php echo esc_url($image_50['url']); ?>" alt="<?php echo esc_attr($image_50['alt']); ?>" />
                                </div>
                            </div>

                <?php
                        endif;
                    endwhile;
                endif; ?>
            </section>


        <?php
        // Blocco 25 / 75
        elseif (get_row_layout() == 'blocco_25_75'): ?>

            <section class="b-25-75 container">

                <?php if (have_rows('selettore_testoimmagine_25_75')):

                    while (have_rows('selettore_testoimmagine_25_75')) : the_row();

                        // Blocco 25 / 75
                        if (get_row_layout() == 'testo_blocco_25_75'): ?>

                            <div class="b-25-75__col">
                                <div class="b-25-75__col__text">
                                    <?php the_sub_field('testo_blocco_25_75'); ?>
                                </div>
                            </div>

                        <?php
                        // Immagine 25 / 75
                        elseif (get_row_layout() == 'immagine_blocco_25_75'):

                            $image_25 = get_sub_field('immagine_blocco_25_75_img'); ?>

                            <div class="b-25-75__col">
                                <div class="b-25-75__col__img">
                                    <img src="<?php echo esc_url($image_25['url']); ?>" alt="<?php echo esc_attr($image_25['alt']); ?>" />
                                </div>
                            </div>

                <?php
                        endif;
                    endwhile;
                endif; ?>
            </section>


        <?php
        // Blocco 33 / 33 / 33
        elseif (get_row_layout() == 'blocco_33_33_33'): ?>

            <section class="b-33 container">

                <?php if (have_rows('selettore_testoimmagine_33_33_33')):

                    while (have_rows('selettore_testoimmagine_33_33_33')) : the_row();

                        // Blocco 33 / 33 / 33
                        if (get_row_layout() == 'testo_blocco_33_33_33'): ?>

                            <div class="b-33__col">
                                <div class="b-33__col__text">
                                    <?php the_sub_field('testo_blocco_33_33_33'); ?>
                                </div>
                            </div>

                        <?php
                        // Immagine 33 / 33 / 33
                        elseif (get_row_layout() == 'immagine_blocco__33_33_33'):

                            $image_25 = get_sub_field('immagine_blocco__33_33_33_img'); ?>

                            <div class="b-33__col">
                                <div class="b-33__col__img">
                                    <img src="<?php echo esc_url($image_25['url']); ?>" alt="<?php echo esc_attr($image_25['alt']); ?>" />
                                </div>
                            </div>

                <?php
                        endif;
                    endwhile;
                endif; ?>
            </section>


        <?php
        // Linea separatrice
        elseif (get_row_layout() == 'linea_separatrice'):

            $linea = get_sub_field('attiva_linea'); ?>

            <?php if ($linea): ?>
                <section class="linea container">
                    <span></span>
                </section>
            <?php endif; ?>


        <?php
        // Separatore
        elseif (get_row_layout() == 'separatore'):

            $separatore = get_sub_field('seleziona_grandezza_separatore'); ?>

            <?php
            // Imposta la classe CSS o lo stile in base alla selezione
            $class_separatore = '';
            if ($separatore == 'Piccolo') {
                $class_separatore = 'separatore-s';
            } elseif ($separatore == 'Medio') {
                $class_separatore = 'separatore-m';
            } elseif ($separatore == 'Grande') {
                $class_separatore = 'separatore-l';
            }
            ?>

            <section class="<?php echo $class_separatore; ?>"></section>


            <?php
        // Slider Repeater
        elseif (get_row_layout() == 'slider_testo_immagine'):

            if (have_rows('testo_immagine_repeater')): ?>

                <section class="slider SwiperTextImg">

                    <ul class="slider__list swiper-wrapper">

                        <?php
                        // Loop through rows.
                        while (have_rows('testo_immagine_repeater')) : the_row();

                            // Load sub field value.
                            $img_value = get_sub_field('immagine_repeater'); ?>

                            <li class="slider__list__item swiper-slide">
                                <div class="slider__list__item__text"><?php echo esc_html(the_sub_field('testo_repeater')); ?></div>
                                <img src="<?php echo esc_url($img_value['url']); ?>" alt="<?php echo esc_attr($img_value['alt']); ?>" />
                            </li>

                        <?php
                        // End loop.
                        endwhile; ?>

                    </ul>

                </section>

            <?php
            endif; ?>

            <?php
        // Mostra contenuti relativi ai Tag
        elseif (get_row_layout() == 'collegamento_a_tag'):
            $selected_tags = get_sub_field('filtro_tag'); // Sostituisci con il nome del campo
            if ($selected_tags):

                // Query per filtrare i post e i custom post type in base ai tag selezionati
                $args = array(
                    'post_type' => array('post', 'opere', 'eventi', 'sponsor'), // Sostituisci con i tuoi CPT
                    'tax_query' => array(
                        'relation' => 'AND', // Cambia se necessario
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'term_id',
                            'terms'    => $selected_tags,
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'in_evidenza_home',
                            'value' => '1',
                            'compare' => '=='
                        )
                    )
                );
                $query = new WP_Query($args);
                if ($query->have_posts()): ?>

                    <section class="tag-filtered-posts container">
                        <ul>

                            <?php while ($query->have_posts()): $query->the_post(); ?>

                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="post-img">
                                            <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                                        </div>
                                        <div class="post-title">
                                            <?php the_title(); ?>
                                        </div>
                                        <span class="post-type">
                                            <?php echo get_content_type_label(get_post_type()); ?>
                                        </span>
                                    </a>
                                </li>

                            <?php endwhile; ?>

                        </ul>
                    </section>

                <?php else: ?>
                    <p>Nessun contenuto trovato per i tag selezionati.</p>
                <?php endif;
                // Ripristina la query originale
                wp_reset_postdata();
            endif;

        // Verifica se il layout corrente è quello del Post Object
        elseif (get_row_layout() == 'sponsor_repeater'):

            // Recupera i post selezionati
            $posts = get_sub_field('selettore_sponsor'); // Sostituisci con il nome del campo

            if ($posts):
                ?>

                <section class="sponsor-field container">
                    <ul>

                        <?php foreach ($posts as $post): ?>
                            <?php setup_postdata($post); ?>

                            <li>
                                <div class="post-img">
                                    <?php the_post_thumbnail('large', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                                </div>
                                <h2 class="post-title"><?php the_title(); ?></h2>
                            </li>

                        <?php endforeach; ?>

                    </ul>
                </section>

            <?php
                wp_reset_postdata();
            endif;

        // Gallery
        elseif (get_row_layout() == 'gallery'):

            $images = get_sub_field('gallery_item');

            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($images): ?>

                <section class="gallery SwiperGallery container">
                    <ul class="gallery__list swiper-wrapper">

                        <?php foreach ($images as $image): ?>

                            <li class="gallery__list__item swiper-slide">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </li>

                        <?php endforeach; ?>

                    </ul>
                </section>

        <?php endif;

        endif; ?>

<?php
    // End loop.
    endwhile;
// Do something...
endif; ?>
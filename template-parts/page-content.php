<?php
if (have_rows('contenuto_pagina')):
    while (have_rows('contenuto_pagina')) : the_row();

        // Blocco 100
        if (get_row_layout() == 'blocco_100'): ?>

            <section class="b-100">
                <div class="b-100__text">
                    <?php the_sub_field('testo_blocco_100'); ?>
                </div>
            </section>

        <?php
        // Immagine 100
        elseif (get_row_layout() == 'immagine_100'):
            $image_100 = get_sub_field('immagine_blocco_100'); ?>

            <section class="img-100">
                <img src="<?php echo esc_url($image_100['url']); ?>" alt="<?php echo esc_attr($image_100['alt']); ?>" />
            </section>

        <?php
        // Blocco 75 / 25
        elseif (get_row_layout() == 'blocco_75_25'): ?>

            <section class="b-75-25">

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

            <section class="b-50-50">

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

            <section class="b-25-75">

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

            <section class="b-33">

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
                <section class="linea">
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
                            <div><?php echo esc_html( the_sub_field('testo_repeater')); ?></div>
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
        // Gallery
        elseif (get_row_layout() == 'gallery'):

            $images = get_sub_field('gallery_item');

            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($images): ?>

                <section class="gallery SwiperGallery">
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
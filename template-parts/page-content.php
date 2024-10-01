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

        // Blocco 75 / 25
        elseif (get_row_layout() == 'blocco_75_25'):

            $img_b_75_25 = get_sub_field('immagine_blocco_75_25'); ?>

            <section class="b-75-25">
                <div class="b-75-25__text">
                    <?php the_sub_field('testo_blocco_75_25'); ?>
                </div>
                <div class="b-75-25__img">
                    <img src="<?php echo esc_url($img_b_75_25['url']); ?>" alt="<?php echo esc_attr($img_b_75_25['alt']); ?>" />
                </div>
            </section>

        <?php

        // Blocco 50 / 50
        elseif (get_row_layout() == 'blocco_50_50'):

            $img_b_50_50 = get_sub_field('immagine_blocco_50_50'); ?>

            <section class="b-50-50">
                <div class="b-50-50__text">
                    <?php the_sub_field('testo_blocco_50_50'); ?>
                </div>
                <div class="b-50-50__img">
                    <img src="<?php echo esc_url($img_b_50_50['url']); ?>" alt="<?php echo esc_attr($img_b_50_50['alt']); ?>" />
                </div>
            </section>

        <?php

        // Blocco 75 / 25
        elseif (get_row_layout() == 'blocco_25_75'):

            $img_b_75_25 = get_sub_field('immagine_blocco_25_75'); ?>

            <section class="b-25-75">
                <div class="b-25-75__text">
                    <?php the_sub_field('testo_blocco_25_75'); ?>
                </div>
                <div class="b-25-75__img">
                    <img src="<?php echo esc_url($img_b_75_25['url']); ?>" alt="<?php echo esc_attr($img_b_75_25['alt']); ?>" />
                </div>
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

        // Linea separatrice
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

        // Linea separatrice
        elseif (get_row_layout() == 'gallery'):

            $images_gallery = get_field('gallery_item');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if ($images_gallery): ?>

                <section class="gallery">
                    <ul class="gallery__list">
                        <?php foreach ($images_gallery as $image_id): ?>
                            <li class="gallery__list__item">
                                <?php echo wp_get_attachment_image($image_id, $size); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

<?php

            endif;
        endif;

    // End loop.
    endwhile;

// No value.
else :
// Do something...
endif; ?>
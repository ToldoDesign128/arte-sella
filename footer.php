<?php

$titolo_1 = get_field('titolo_colonna_1', 'option');
$titolo_2 = get_field('titolo_colonna_2', 'option');
$titolo_3 = get_field('titolo_colonna_3', 'option');

?>

<footer class="footer">
    <div class="footer-wrap container">
        <div class="footer-col">
            <?php if ($titolo_1) : ?>
                <p class="footer-col__title title-4 bold">
                    <?php echo esc_html($titolo_1); ?>
                </p>
            <?php endif; ?>
            <div class="footer-col__content">
                <?php
                if (have_rows('footer_content_1', 'option')):

                    while (have_rows('footer_content_1', 'option')) : the_row();

                        // Case: Testo
                        if (get_row_layout() == 'testo_footer_1'):
                            $text_footer_1 = get_sub_field('testo_footer'); ?>

                            <p>
                                <?php echo esc_html($text_footer_1); ?>
                            </p>

                            <?php
                        // Case: Link
                        elseif (get_row_layout() == 'link_footer_1'):
                            $link_footer_1 = get_sub_field('link_footer');

                            if ($link_footer_1):
                                $link_footer_1_url = $link_footer_1['url'];
                                $link_footer_1_title = $link_footer_1['title'];
                                $link_footer_1_target = $link_footer_1['target'] ? $link_footer_1['target'] : '_self'; ?>

                                <a href="<?php echo esc_url($link_footer_1_url); ?>" target="<?php echo esc_attr($link_footer_1_target); ?>" class="footer-col__content__link">
                                    <?php echo esc_html($link_footer_1_title); ?>
                                </a>

                            <?php
                            endif;
                        // Case: Icona
                        elseif (get_row_layout() == 'icone_footer_1'):

                            // Check rows exists.
                            if (have_rows('repeater_icone')): ?>

                                <div class="icon-container">

                                    <?php
                                    // Loop through rows.
                                    while (have_rows('repeater_icone')) : the_row();


                                        $icon_link_footer_1 = get_sub_field('link_icona');
                                        $icon_footer_1 = get_sub_field('icona_footer'); ?>


                                        <?php

                                        if ($icon_link_footer_1):
                                            $icon_link_footer_1_url = $icon_link_footer_1['url'];
                                            $icon_link_footer_1_title = $icon_link_footer_1['title'];
                                            $icon_link_footer_1_target = $icon_link_footer_1['target'] ? $icon_link_footer_1['target'] : '_self'; ?>

                                            <a href="<?php echo esc_url($icon_link_footer_1_url); ?>" target="<?php echo esc_attr($icon_link_footer_1_target); ?>">
                                                <img src="<?php echo esc_url($icon_footer_1['url']); ?>" alt="<?php echo esc_attr($icon_footer_1['alt']); ?>" />
                                            </a>
                                    <?php
                                        endif;
                                    endwhile;
                                    ?>

                                </div>

                            <?php
                            endif; ?>
                <?php
                        endif;
                    endwhile;
                endif; ?>
            </div>
        </div>
        <div class="footer-col">
            <?php if ($titolo_2) : ?>
                <p class="footer-col__title title-4 bold">
                    <?php echo esc_html($titolo_2); ?>
                </p>
            <?php endif; ?>
            <div class="footer-col__content">
                <?php
                if (have_rows('footer_content_2', 'option')):

                    while (have_rows('footer_content_2', 'option')) : the_row();

                        // Case: Testo
                        if (get_row_layout() == 'testo_footer_2'):
                            $text_footer_2 = get_sub_field('testo_footer'); ?>

                            <p>
                                <?php echo esc_html($text_footer_2); ?>
                            </p>

                            <?php
                        // Case: Link
                        elseif (get_row_layout() == 'link_footer_2'):
                            $link_footer_2 = get_sub_field('link_footer');

                            if ($link_footer_2):
                                $link_footer_2_url = $link_footer_2['url'];
                                $link_footer_2_title = $link_footer_2['title'];
                                $link_footer_2_target = $link_footer_2['target'] ? $link_footer_2['target'] : '_self'; ?>

                                <a href="<?php echo esc_url($link_footer_2_url); ?>" target="<?php echo esc_attr($link_footer_2_target); ?>" class="footer-col__content__link">
                                    <?php echo esc_html($link_footer_2_title); ?>
                                </a>

                            <?php
                            endif;
                        // Case: Icona
                        elseif (get_row_layout() == 'icone_footer_2'):

                            // Check rows exists.
                            if (have_rows('repeater_icone')): ?>

                                <div class="icon-container">

                                    <?php
                                    // Loop through rows.
                                    while (have_rows('repeater_icone')) : the_row();
                                        $icon_link_footer_2 = get_sub_field('link_icona');
                                        $icon_footer_2 = get_sub_field('icona_footer');

                                        if ($icon_link_footer_2):
                                            $icon_link_footer_2_url = $icon_link_footer_2['url'];
                                            $icon_link_footer_2_title = $icon_link_footer_2['title'];
                                            $icon_link_footer_2_target = $icon_link_footer_2['target'] ? $icon_link_footer_2['target'] : '_self'; ?>

                                            <a href="<?php echo esc_url($icon_link_footer_2_url); ?>" target="<?php echo esc_attr($icon_link_footer_2_target); ?>">
                                                <img src="<?php echo esc_url($icon_footer_2['url']); ?>" alt="<?php echo esc_attr($icon_footer_2['alt']); ?>" />
                                            </a>
                                    <?php
                                        endif;
                                    endwhile;
                                    ?>

                                </div>

                            <?php
                            endif; ?>
                <?php
                        endif;
                    endwhile;
                endif; ?>
            </div>
        </div>
        <div class="footer-col">
            <?php if ($titolo_3) : ?>
                <p class="footer-col__title title-4 bold">
                    <?php echo esc_html($titolo_3); ?>
                </p>
            <?php endif; ?>
            <div class="footer-col__content">
                <?php
                if (have_rows('footer_content_3', 'option')):

                    while (have_rows('footer_content_3', 'option')) : the_row();

                        // Case: Testo
                        if (get_row_layout() == 'testo_footer_3'):
                            $text_footer_3 = get_sub_field('testo_footer'); ?>

                            <p class="footer-col__content__text">
                                <?php echo esc_html($text_footer_3); ?>
                            </p>

                            <?php
                        // Case: Link
                        elseif (get_row_layout() == 'link_footer_3'):
                            $link_footer_3 = get_sub_field('link_footer');

                            if ($link_footer_3):
                                $link_footer_3_url = $link_footer_3['url'];
                                $link_footer_3_title = $link_footer_3['title'];
                                $link_footer_3_target = $link_footer_3['target'] ? $link_footer_3['target'] : '_self'; ?>

                                <a href="<?php echo esc_url($link_footer_3_url); ?>" target="<?php echo esc_attr($link_footer_3_target); ?>" class="footer-col__content__link">
                                    <?php echo esc_html($link_footer_3_title); ?>
                                </a>

                            <?php
                            endif;
                        // Case: Icona
                        elseif (get_row_layout() == 'icone_footer_3'):

                            // Check rows exists.
                            if (have_rows('repeater_icone')): ?>

                                <div class="icon-container">

                                    <?php
                                    // Loop through rows.
                                    while (have_rows('repeater_icone')) : the_row();
                                        $icon_link_footer_3 = get_sub_field('link_icona');
                                        $icon_footer_3 = get_sub_field('icona_footer');

                                        if ($icon_link_footer_3):
                                            $icon_link_footer_3_url = $icon_link_footer_3['url'];
                                            $icon_link_footer_3_title = $icon_link_footer_3['title'];
                                            $icon_link_footer_3_target = $icon_link_footer_3['target'] ? $icon_link_footer_3['target'] : '_self'; ?>

                                            <a class="footer-col__content__icon" href="<?php echo esc_url($icon_link_footer_3_url); ?>" target="<?php echo esc_attr($icon_link_footer_3_target); ?>">
                                                <img src="<?php echo esc_url($icon_footer_3['url']); ?>" alt="<?php echo esc_attr($icon_footer_3['alt']); ?>" />
                                            </a>
                                    <?php
                                        endif;
                                    endwhile;
                                    ?>

                                </div>

                            <?php
                            endif; ?>
                <?php
                        endif;
                    endwhile;
                endif; ?>


            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $subtitle = get_field('sottotitolo');
        $date_inizio = get_field('data_evento_inizio');
        $date_fine = get_field('data_evento_fine');
        $place = get_field('luogo_evento');
        $time = get_field('ore');
        $thumb_url = get_the_post_thumbnail_url();
        $content = apply_filters('the_content', get_the_content());
    }
}
?>

<!-- Hero page -->
<div class="container">
    <div class="hero-eventi">
        <h1 class="title-1 bold">/ <?php echo $title ?></h1>

        <?php if ($subtitle) : ?>
            <h2 class="text-body">
                <?php echo $subtitle ?>
            </h2>
        <?php endif; ?>

        <div class="info-box">
            <?php if ($date_fine) : ?>
                <span class="title-2 text-body">
                    Dal <?php echo $date_inizio ?> al <?php echo $date_fine ?>
                </span>
            <?php else : ?>
                <span class="title-2 text-body">
                    <?php echo $date_inizio ?>
                </span>
            <?php endif; ?>
            <?php if ($place) : ?>
                <span class="title-2 text-body">
                    <?php echo $place ?>
                </span>
            <?php endif;
            if ($time) : ?>
                <span class="title-2 text-body">
                    <?php echo $time ?>
                </span>
            <?php endif; ?>
        </div>
        <div class="image-box">
            <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
        </div>
        <div class="post-content text-body">
            <?php echo $content ?>
        </div>
    </div>
</div>
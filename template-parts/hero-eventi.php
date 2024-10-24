<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $subtitle = get_field('sottotitolo');
        $date = get_field('data_evento');
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
            <h2 class="title-2">
                <?php echo $subtitle ?>
            </h2>
        <?php endif; ?>

        <div class="info-box">
            <span class="title-2">
                <?php echo $date ?>
            </span>
            <span class="title-2">
                <?php echo $place ?>
            </span>
            <span class="title-2">
                <?php echo $time ?>
            </span>
        </div>
        <div class="image-box">
            <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
        </div>
        <div class="post-content">
            <?php echo $content ?>
        </div>
    </div>
</div>
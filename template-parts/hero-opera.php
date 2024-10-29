<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $thumb_url = get_the_post_thumbnail_url();
        $author = get_field('autore_opera');
        $year = get_field('anno_opera');
        $subtitle = get_field('sottotitolo');
        $content = apply_filters('the_content', get_the_content());
    }
}
?>

<!-- Hero page -->
<div class="container">
    <div class="hero-opera">
        <h1 class="title-1 bold">/ <?php echo $title ?></h1>

        <?php if ($subtitle) : ?>
            <h2 class="title-2">
                <?php echo $subtitle ?>
            </h2>
        <?php endif; ?>

        <div class="author-box">
            <span class="author title-2">
                <?php echo $author ?>, <?php echo $year ?>
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
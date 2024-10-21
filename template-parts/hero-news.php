<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $subtitle = get_field('sottotitolo');
        $tags = get_the_tags();
        $thumb_url = get_the_post_thumbnail_url();
    }
}
?>

<!-- Hero News -->
<div class="container">
    <div class="hero-news">
        <h1 class="title-1 bold">/ <?php echo $title ?></h1>

        <?php if ($subtitle) : ?>
            <h2 class="title-2">
                <?php echo $subtitle ?>
            </h2>
        <?php endif; ?>

        <?php if ($tags) : ?>
            <div class="tag-box">
                <?php foreach ($tags as $tag) { ?>
                    <span class="title-2">
                        <?php echo $tag->name;?>
                    </span>
                <?php } ?>
            </div>
        <?php endif; ?>
        
        <div class="image-box">
            <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
        </div>
    </div>
</div>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $title = get_the_title();
        $subtitle = get_field('sottotitolo');
        $thumb_url = get_the_post_thumbnail_url();
        $content = apply_filters('the_content', get_the_content());
    }
}
?>

<!-- Hero Page -->
<div class="container">
    <div class="hero-page">
        <h1 class="title-1 bold">/ <?php echo $title ?></h1>

        <?php if ($subtitle) : ?>
            <h2 class="text-body">
                <?php echo $subtitle ?>
            </h2>
        <?php endif; ?>
    </div>
</div>

<?php if ($subtitle) : ?>
    <span class="hero-page-divider"></span>
<?php endif; ?>

<?php if ($thumb_url || $content) : ?>
    <div class="hero-page-content container">
        <?php if ($thumb_url) : ?>
            <div class="image-box">
                <img src="<?php echo $thumb_url ?>" alt="<?php echo $title ?>" width="100%" class="thumbnail">
            </div>
        <?php endif; ?>
        <div class="post-content text-body">
            <?php echo $content ?>
        </div>
    </div>
<?php endif; ?>
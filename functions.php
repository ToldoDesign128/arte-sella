<?php
if (!function_exists('arte_sella_setup')) :
	function arte_sella_setup()
	{
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support('post-thumbnails');
		// Remove Guttemberg editor
		add_filter('use_block_editor_for_post', '__return_false');
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(array(
			'primary'   => __('Primary Menu', 'arte_sella')
		));
		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
	}
endif; // arte_sella_setup
add_action('after_setup_theme', 'arte_sella_setup');


// Custom logo
function arte_sella_custom_logo_setup()
{
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);

	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'arte_sella_custom_logo_setup');

// Remove comments
add_action('admin_init', function () {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}

	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

// Remove the content editor from ALL pages
add_action('admin_head', 'remove_content_editor');
function remove_content_editor()
{
	remove_post_type_support('page', 'editor');
}

function add_theme_scripts()
{
	wp_enqueue_style('swiper-style', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css");

	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), 1.1, true);

	wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts.js', array('jquery'), 1.1, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// Filtro per Tag
function includi_cpt_in_archivio_tag($query) {
    if ($query->is_tag() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'opere', 'eventi', 'sponsor')); // Aggiungi i CPT qui
    }
}
add_action('pre_get_posts', 'includi_cpt_in_archivio_tag');



//CPT
require dirname(__FILE__) . '/functions-parts/cpt-eventi.php';
require dirname(__FILE__) . '/functions-parts/cpt-opere.php';
require dirname(__FILE__) . '/functions-parts/cpt-sponsor.php';
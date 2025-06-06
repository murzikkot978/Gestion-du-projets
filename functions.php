<?php
// Custom functions
//require_once(get_template_directory() . '/blocks/init-blocks.php');
//require_once(get_template_directory() . '/blocks/block-variation.php');
require_once(get_template_directory() . '/functions/reusable_blocks-menu.php');
//require_once(get_template_directory() . '/functions/TrivialForge-functions.php');
require_once(get_template_directory() . '/functions/editor-styles.php');
require_once(get_template_directory() . '/functions/editor-styles.php');
// General setup
require_once(get_template_directory() . '/functions/general/enqueue-theme.php');


// Helpers
require_once(get_template_directory() . '/functions/helpers/css-js-bundle-handling.php');


// Gutenberg
require_once(get_template_directory() . '/functions/gutenberg/register-blocks.php');
require_once(get_template_directory() . '/functions/gutenberg/declare-block-category.php');
require_once(get_template_directory() . '/functions/gutenberg/limit-blocks-usage.php');
// Components
require_once(get_template_directory() . '/functions/components/get_img_element.php');

remove_theme_support('core-block-patterns');

/**
 * Theme setup.
 */
function TrivialForge_setup()
{


	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'TrivialForge')
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_image_size('wide', 1920);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	remove_theme_support('core-block-patterns');

	add_theme_support('editor-styles');
	add_editor_style();
}

add_action('after_setup_theme', 'TrivialForge_setup');

/**
 * Enqueue theme assets.
 *//* 
function TrivialForge_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('TrivialForge', get_stylesheet_directory_uri() . '/css/app.css', array(), $theme->get('Version'));
	wp_enqueue_script('TrivialForge', get_stylesheet_directory_uri() . '/js/app.js', array('jquery'), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'TrivialForge_enqueue_scripts');
 */


/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function TrivialForge_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_" . $depth})) {
		$classes[] = $args->{"li_class_" . $depth};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'TrivialForge_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function TrivialForge_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_" . $depth})) {
		$classes[] = $args->{"submenu_class_" . $depth};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'TrivialForge_nav_menu_add_submenu_class', 10, 3);

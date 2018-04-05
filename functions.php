<?php

require("bs4Navwalker.php");

function mbt_register_menus() {
	// this function registers menus
	register_nav_menus([
		'primary_menu' => 'Huvudmeny',
	]);
}
add_action('init', 'mbt_register_menus');

function mbt_styles() {
	wp_enqueue_style('bootstrap4-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('mbt-styles', get_stylesheet_directory_uri() . '/style.css');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], '3.2.1', true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.12.9', true);
	wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], '4.0.0', true);
}
add_action('wp_enqueue_scripts', 'mbt_styles');

function mbt_setup() {
	add_theme_support('post-thumbnails');

	// add some image sizes specific to our theme
	add_image_size('post-featured-image', 2560, 500, true);
}
add_action('after_setup_theme', 'mbt_setup');

function mbt_widgets() {
	// register blog sidebar
	register_sidebar([
		'name'			=> "Sidofält för bloggen",
		'id'			=> 'sidebar_blog',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	]);

	// register footer sidebar
	register_sidebar([
		'name'			=> "Sidfots-widgetar",
		'id'			=> 'sidebar_footer',
		'before_widget'	=> '<div id="%1$s" class="widget col %2$s">',
		'after_widget'	=> '</div>',
	]);
}
add_action('widgets_init', 'mbt_widgets');

<?php
if ( ! function_exists( 'solub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Twenty Fifteen 1.0
 */
function solub_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'solub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'solub' ),
		'social'  => __( 'Social Links Menu', 'solub' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'gallery',
		'audio',
	) );
}
endif;
add_action( 'after_setup_theme', 'solub_setup' );


// solub scripts and styles 
function solub_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all' );

	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'solub_theme_scripts' );
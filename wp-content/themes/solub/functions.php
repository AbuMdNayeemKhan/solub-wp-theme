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
	set_post_thumbnail_size( 825, 510, true );

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
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Custom background support
	if ( function_exists( 'solub_get_color_scheme' ) ) {
		$color_scheme  = solub_get_color_scheme();
		$default_color = trim( $color_scheme[0], '#' );
	} else {
		$default_color = 'ffffff'; // fallback default
	}

	add_theme_support( 'custom-background', apply_filters( 'solub_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	if ( function_exists( 'solub_fonts_url' ) ) {
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', solub_fonts_url() ) );
	} else {
		add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css' ) );
	}
}
endif;
add_action( 'after_setup_theme', 'solub_setup' );

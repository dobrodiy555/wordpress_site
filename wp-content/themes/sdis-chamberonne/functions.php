<?php
/**
 * sdis-chamberonne functions and definitions
 *
 * @package sdis-chamberonne
 */

if ( ! function_exists( 'sdis_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 */
	
	function sdis_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'sdis', get_template_directory() . '/languages' );
		
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
		
		//Let WordPress manage the document title.
		add_theme_support('title-tag');
		
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'sdis' ),
			'secondary' => __( 'Secondary Menu', 'sdis' ),
		) );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
		
		/**
		 * Enable support for the following post formats:
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'sdis_setup' );


/*
 * enqueue styles and scripts
 */
function sdis_styles_and_scripts() {
	wp_enqueue_style( 'sdis-style', get_template_directory_uri() . '/css/style.css', array(), 1.0, 'all' );
	wp_enqueue_style( 'sdis-main-style', get_template_directory_uri() . '/style.css', array(), 1.0, 'all' );
	wp_enqueue_style('sdis-swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css' );
	wp_enqueue_script( 'sdis-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', null, '1.0', true );
	wp_enqueue_script( 'sdis-swiper-js', '//cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.js', null, '4.4.6', true );
	wp_enqueue_script( 'sdis-slider', get_template_directory_uri() . '/js/function_slider.js', array('sdis-jquery'), 1.0, true );
	wp_enqueue_script( 'sdis_main', get_stylesheet_directory_uri() . '/js/main.js', array('sdis-jquery'), 1.0, true );
}
add_action( 'wp_enqueue_scripts', 'sdis_styles_and_scripts' );




/*
// rename 'alarme' custom post type slug to 'alarmes'
*/
function sdis_change_post_type_slug( $args, $post_type ) {
	if ( 'alarme' === $post_type ) {
		$args['rewrite']['slug'] = 'alarmes';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'sdis_change_post_type_slug', 10, 2 );


// need to create custom post types and fields programmatically

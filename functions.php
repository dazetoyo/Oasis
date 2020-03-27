<?php

// Enqueue Scrips and styles
function increase_custom_enqueue_wp() {
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri().'/includes/scripts/bootstrap/dist/js/bootstrap.bundle.min.js', array( 'jquery'), '1.0.0', true );
	wp_enqueue_script( 'increase', get_stylesheet_directory_uri().'/assets/js/increase.js', array( 'jquery'), filemtime(get_stylesheet_directory().'/assets/js/increase.js'), true );
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri().'/includes/scripts/slick/slick.min.js', array( 'jquery'), '1.0.0', true );
	wp_enqueue_script( 'tippy', get_stylesheet_directory_uri().'/includes/scripts/tippy.all.min.js', array( 'jquery'), '1.0.0', true );
	wp_enqueue_script( 'lazy', get_stylesheet_directory_uri().'/includes/scripts/jquery.lazy/jquery.lazy.min.js', array( 'jquery'), '1.0.0', false );




	wp_enqueue_script( 'fullpagescroll', get_stylesheet_directory_uri().'/includes/scripts/fullpage/scrolloverflow.min.js', array( 'jquery'), '1.0.0', true );


	wp_enqueue_script( 'fullpage', get_stylesheet_directory_uri().'/includes/scripts/fullpage/fullpage.extensions.min.js', array( 'jquery'), '1.0.0', true );




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}



	wp_enqueue_style( 'fullpage', get_stylesheet_directory_uri().'/includes/scripts/fullpage/fullpage.min.css', array(), filemtime(get_stylesheet_directory().'/includes/scripts/fullpage/fullpage.min.css') );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/includes/scripts/bootstrap/scss/bootstrap.css', array(), filemtime(get_stylesheet_directory().'/includes/scripts/bootstrap/scss/bootstrap.css') );
	wp_enqueue_style( 'increaseicons-font', get_stylesheet_directory_uri().'/assets/fonts/increaseicons/style.css', '', filemtime( get_stylesheet_directory() . '/assets/fonts/increaseicons/style.css') );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri().'/includes/scripts/slick/slick.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/slick/slick.css') );
	wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri().'/includes/scripts/slick/slick-theme.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/slick/slick-theme.css') );
	//wp_enqueue_style( 'animatecss', get_stylesheet_directory_uri().'/includes/scripts/animatecss/animate.css', '', filemtime( get_stylesheet_directory() . '/includes/scripts/animatecss/animate.css') );

	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/assets/css/main.css', array('style'), filemtime( get_stylesheet_directory() . '/assets/css/main.css') );
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri().'/assets/css/responsive.css', array('main'), filemtime( get_stylesheet_directory() . '/assets/css/responsive.css') );

	//    wp_enqueue_style( 'increase-shortcodes', get_stylesheet_directory_uri().'/assets/css/shortcodes.css', array('responsive'), filemtime( get_stylesheet_directory() . '/assets/css/shortcodes.css') );



}

add_action( 'wp_enqueue_scripts', 'increase_custom_enqueue_wp' );

function increase_custom_enqueue_admin() {
	wp_enqueue_style( 'admin', get_stylesheet_directory_uri().'/assets/css/admin.css', false, filemtime( get_stylesheet_directory() . '/assets/css/admin.css') );
}

add_action( 'admin_enqueue_scripts', 'increase_custom_enqueue_admin' );




include_once wp_normalize_path( get_template_directory() . '/includes/functions/theme-setup.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/admin.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/acf.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/create-posttype.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/create-taxonomy.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/wp-bootstrap-navwalker.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/shortcodes.php' );
include_once wp_normalize_path( get_template_directory() . '/includes/functions/class-tgm-plugin-activation.php' );

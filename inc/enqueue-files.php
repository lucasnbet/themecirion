<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: Cirion
 * URL: https://cirion.com/
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'cirion_vt_scripts_styles' ) ) {
  function cirion_vt_scripts_styles() {

    // Styles
    wp_enqueue_style( 'owl-carousel', CIRION_CSS . '/owl.carousel.min.css', array(), '2.3.4', 'all', false );
    // Feature Popup Video
    wp_enqueue_style( 'magnific-popup', CIRION_CSS . '/magnific-popup.css', array(), '1.1.0', 'all', false );
    // Feature Popup Video
    wp_enqueue_style( 'font-awesome', CIRION_CSS . '/font-awesome.min.css', array(), '4.7.0', 'all', false );
    wp_enqueue_style( 'bootstrap', CIRION_CSS .'/bootstrap.min.css', array(), '5.2.2', 'all', false );
    wp_enqueue_style( 'cirion-style', get_stylesheet_uri() );
    wp_enqueue_style( 'cirion-styles', CIRION_CSS .'/styles.css', array(), CIRION_VERSION, 'all', false ); 

    // Start code - Hero Banner Slider Enhancement feature is added by Verticurl - 27/10/2023
    wp_enqueue_script( 'youtube','https://www.youtube.com/iframe_api', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'vimeo','https://player.vimeo.com/api/player.js', array( 'jquery' ), '1.0.0', true );

    // Scripts
    wp_enqueue_script( 'bootstrap', CIRION_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '5.2.2', true );
    wp_enqueue_script( 'packery-mode-pkgd', CIRION_SCRIPTS . '/plugins.js', array( 'jquery' ), CIRION_VERSION, true );
    wp_enqueue_script( 'cirion-skip-link-focus-fix', CIRION_SCRIPTS . '/skip-link-focus-fix.js', array(), CIRION_VERSION, true );
    wp_enqueue_script( 'cirion-scripts', CIRION_SCRIPTS . '/scripts.js', array( 'jquery' ), CIRION_VERSION, true );

    // Responsive
    wp_enqueue_style( 'cirion-responsive', CIRION_CSS .'/responsive.css', array(), CIRION_VERSION, 'all' );

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
	
	// Theme options - Inline styles
	wp_enqueue_style( 'cirion-theme-options-styles', CIRION_CSS .'/inline-styles.css', array(), CIRION_VERSION, 'all' );

  }
  add_action( 'wp_enqueue_scripts', 'cirion_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'cirion_vt_admin_scripts_styles' ) ) {
  function cirion_vt_admin_scripts_styles() {
    wp_enqueue_style( 'font-awesome', CIRION_CSS . '/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'admin-styles', CIRION_CSS . '/admin-styles.css', array(), CIRION_VERSION, 'all' );
  }
  add_action( 'admin_enqueue_scripts', 'cirion_vt_admin_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function cirion_add_editor_styles() {
  add_editor_style( get_stylesheet_uri() );
}
add_action( 'init', 'cirion_add_editor_styles' );

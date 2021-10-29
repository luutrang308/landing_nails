<?php

if ( ! function_exists( 'reina_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function reina_child_theme_enqueue_scripts() {
		$main_style = 'reina-main';
		
		wp_enqueue_style( 'reina-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'reina_child_theme_enqueue_scripts' );
}
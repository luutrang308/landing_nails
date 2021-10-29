<?php

if ( ! function_exists( 'reina_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function reina_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'reina_filter_mobile_header_template', reina_get_template_part( 'mobile-header', 'templates/mobile-header' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	
	add_action( 'reina_action_page_header_template', 'reina_load_page_mobile_header' );
}

if ( ! function_exists( 'reina_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function reina_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'reina_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'reina' ) ) );
		
		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}
	
	add_action( 'reina_action_after_include_modules', 'reina_register_mobile_navigation_menus' );
}
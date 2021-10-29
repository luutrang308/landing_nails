<?php

if ( ! function_exists( 'reina_core_add_two_rotating_circles_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param array $layouts  - module layouts
	 *
	 * @return array
	 */
	function reina_core_add_two_rotating_circles_spinner_layout_option( $layouts ) {
		$layouts['two-rotating-circles'] = esc_html__( '2 Rotating Circles', 'reina-core' );
		
		return $layouts;
	}
	
	add_filter( 'reina_core_filter_page_spinner_layout_options', 'reina_core_add_two_rotating_circles_spinner_layout_option' );
}
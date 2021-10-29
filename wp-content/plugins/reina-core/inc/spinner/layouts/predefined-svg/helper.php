<?php

if ( ! function_exists( 'reina_core_add_predefined_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function reina_core_add_predefined_spinner_layout_option( $layouts ) {
		$layouts['predefined-svg'] = esc_html__( 'Predefined Svg', 'reina-core' );
		
		return $layouts;
	}
	
	add_filter( 'reina_core_filter_page_spinner_layout_options', 'reina_core_add_predefined_spinner_layout_option' );
}

if ( ! function_exists( 'reina_core_set_predefined_spinner_layout_as_default_option' ) ) {
	/**
	 * Function that set default value for page spinner layout options map
	 *
	 * @param $default_value string
	 *
	 * @return string
	 */
	function reina_core_set_predefined_spinner_layout_as_default_option( $default_value ) {
		return 'predefined-svg';
	}
	add_filter( 'reina_core_filter_page_spinner_default_layout_option', 'reina_core_set_predefined_spinner_layout_as_default_option' );
}

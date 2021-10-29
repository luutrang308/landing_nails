<?php
if ( ! function_exists( 'reina_core_add_minimal_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */

	function reina_core_add_minimal_header_global_option( $header_layout_options ) {
		$header_layout_options['minimal'] = array(
			'image' => REINA_CORE_HEADER_LAYOUTS_URL_PATH . '/minimal/assets/img/minimal-header.png',
			'label' => esc_html__( 'Minimal', 'reina-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'reina_core_filter_header_layout_option', 'reina_core_add_minimal_header_global_option' );
}


if ( ! function_exists( 'reina_core_register_minimal_header_layout' ) ) {
	/**
	 * Function which add header layout into global list
	 *
	 * @param array $header_layouts
	 *
	 * @return array
	 */
	function reina_core_register_minimal_header_layout( $header_layouts ) {
		$header_layout = array(
			'minimal' => 'MinimalHeader'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'reina_core_filter_register_header_layouts', 'reina_core_register_minimal_header_layout');
}
<?php

if ( ! function_exists( 'reina_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function reina_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'reina-core' );

		return $options;
	}

	add_filter( 'reina_core_filter_header_scroll_appearance_option', 'reina_core_add_fixed_header_option' );
}
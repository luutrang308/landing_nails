<?php

if ( ! function_exists( 'reina_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_button_layouts', 'reina_core_add_button_variation_filled' );
}

<?php

if ( ! function_exists( 'reina_core_add_countdown_variation_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_countdown_variation_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_countdown_layouts', 'reina_core_add_countdown_variation_simple' );
}

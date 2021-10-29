<?php

if ( ! function_exists( 'reina_core_add_pricing_table_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_pricing_table_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_pricing_table_layouts', 'reina_core_add_pricing_table_variation_standard' );
}
<?php

if ( ! function_exists( 'reina_core_add_call_to_action_variation_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_call_to_action_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_call_to_action_layouts', 'reina_core_add_call_to_action_variation_standard' );
}

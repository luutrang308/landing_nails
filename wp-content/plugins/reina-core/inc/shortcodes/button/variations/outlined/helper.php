<?php

if ( ! function_exists( 'reina_core_add_button_variation_outlined' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_button_variation_outlined( $variations ) {
		$variations['outlined'] = esc_html__( 'Outlined', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_button_layouts', 'reina_core_add_button_variation_outlined' );
}

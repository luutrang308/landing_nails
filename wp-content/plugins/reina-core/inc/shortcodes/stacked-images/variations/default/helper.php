<?php

if ( ! function_exists( 'reina_core_add_stacked_images_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_stacked_images_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_stacked_images_layouts', 'reina_core_add_stacked_images_variation_default' );
}

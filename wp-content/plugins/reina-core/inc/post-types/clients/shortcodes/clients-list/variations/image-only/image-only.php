<?php

if ( ! function_exists( 'reina_core_add_clients_list_variation_image_only' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_clients_list_variation_image_only( $variations ) {
		$variations['image-only'] = esc_html__( 'Image Only', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_clients_list_layouts', 'reina_core_add_clients_list_variation_image_only' );
}
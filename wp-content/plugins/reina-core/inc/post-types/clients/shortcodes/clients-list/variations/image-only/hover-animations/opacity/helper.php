<?php

if ( ! function_exists( 'reina_core_filter_clients_list_image_only_opacity' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_filter_clients_list_image_only_opacity( $variations ) {
		$variations['opacity'] = esc_html__( 'Opacity', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_clients_list_image_only_animation_options', 'reina_core_filter_clients_list_image_only_opacity' );
}
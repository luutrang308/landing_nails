<?php

if ( ! function_exists( 'reina_core_filter_clients_list_image_only_fade_in' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_filter_clients_list_image_only_fade_in( $variations ) {
		$variations['fade-in'] = esc_html__( 'Fade In', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_clients_list_image_only_animation_options', 'reina_core_filter_clients_list_image_only_fade_in' );
}
<?php

if ( ! function_exists( 'reina_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_banner_layouts', 'reina_core_add_banner_variation_link_button' );
}

<?php

if ( ! function_exists( 'reina_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_banner_layouts', 'reina_core_add_banner_variation_link_overlay' );
}

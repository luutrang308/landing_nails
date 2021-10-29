<?php

if ( ! function_exists( 'reina_core_add_image_section_info_variation_info_on_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_image_section_info_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_image_section_info_layouts', 'reina_core_add_image_section_info_variation_info_on_image' );
}

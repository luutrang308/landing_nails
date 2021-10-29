<?php

if ( ! function_exists( 'reina_core_add_image_section_info_variation_with_svg' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_image_section_info_variation_with_svg( $variations ) {
		$variations['with-svg'] = esc_html__( 'With SVG', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_image_section_info_layouts', 'reina_core_add_image_section_info_variation_with_svg' );
}

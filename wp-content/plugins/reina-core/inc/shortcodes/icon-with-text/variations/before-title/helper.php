<?php

if ( ! function_exists( 'reina_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_icon_with_text_layouts', 'reina_core_add_icon_with_text_variation_before_title' );
}

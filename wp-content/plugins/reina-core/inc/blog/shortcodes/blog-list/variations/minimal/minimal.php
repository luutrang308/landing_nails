<?php

if ( ! function_exists( 'reina_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_blog_list_layouts', 'reina_core_add_blog_list_variation_minimal' );
}
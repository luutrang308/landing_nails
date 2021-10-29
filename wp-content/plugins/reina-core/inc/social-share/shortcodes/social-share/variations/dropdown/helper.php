<?php

if ( ! function_exists( 'reina_core_add_social_share_variation_dropdown' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_social_share_variation_dropdown( $variations ) {
		$variations['dropdown'] = esc_html__( 'Dropdown', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_social_share_layouts', 'reina_core_add_social_share_variation_dropdown' );
}

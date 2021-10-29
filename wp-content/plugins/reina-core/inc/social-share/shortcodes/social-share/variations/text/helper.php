<?php

if ( ! function_exists( 'reina_core_add_social_share_variation_text' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_social_share_variation_text( $variations ) {
		$variations['text'] = esc_html__( 'Text', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_social_share_layouts', 'reina_core_add_social_share_variation_text' );
}

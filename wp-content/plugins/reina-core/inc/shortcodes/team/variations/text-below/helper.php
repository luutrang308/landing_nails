<?php

if ( ! function_exists( 'reina_core_add_team_variation_text_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_team_variation_text_below( $variations ) {
		$variations['text-below'] = esc_html__( 'Text Below', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_team_layouts', 'reina_core_add_team_variation_text_below' );
}

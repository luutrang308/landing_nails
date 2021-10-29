<?php

if ( ! function_exists( 'reina_core_add_portfolio_list_variation_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_portfolio_list_variation_info_follow( $variations ) {
		
		$variations['info-follow'] = esc_html__( 'Info Follow', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_portfolio_list_layouts', 'reina_core_add_portfolio_list_variation_info_follow' );
}
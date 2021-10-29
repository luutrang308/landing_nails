<?php

if ( ! function_exists( 'reina_core_add_portfolio_single_variation_slider' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_portfolio_single_variation_slider( $variations ) {
		$variations['slider'] = esc_html__( 'Slider', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_portfolio_single_layout_options', 'reina_core_add_portfolio_single_variation_slider' );
}

if ( ! function_exists( 'reina_core_add_portfolio_single_slider' ) ) {
	/**
	 * Function that include slider module before page content
	 */
	function reina_core_add_portfolio_single_slider() {
		if ( reina_core_get_post_value_through_levels( 'qodef_portfolio_single_layout' ) == 'slider' ) {
			reina_core_template_part( 'post-types/portfolio', 'variations/slider/layout/parts/slider' );
		}
	}
	
	add_action( 'reina_action_before_page_inner', 'reina_core_add_portfolio_single_slider' );
}
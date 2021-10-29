<?php
if ( ! function_exists( 'reina_core_filter_portfolio_list_info_follow' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_filter_portfolio_list_info_follow( $variations ) {

		$variations['follow'] = esc_html__( 'Follow', 'reina-core' );

		return $variations;
	}

	add_filter( 'reina_core_filter_portfolio_list_info_follow_animation_options', 'reina_core_filter_portfolio_list_info_follow' );
}
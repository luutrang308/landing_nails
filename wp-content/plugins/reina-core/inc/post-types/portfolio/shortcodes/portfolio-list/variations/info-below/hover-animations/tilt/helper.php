<?php

if ( ! function_exists( 'reina_core_filter_portfolio_list_info_below_tilt' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_filter_portfolio_list_info_below_tilt( $variations ) {
		$variations['tilt'] = esc_html__( 'Tilt', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_portfolio_list_info_below_animation_options', 'reina_core_filter_portfolio_list_info_below_tilt' );
}

if ( ! function_exists( 'reina_core_include_tilt_scripts' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts
	 *
	 * @param array $atts
	 */
	function reina_core_include_tilt_scripts( $atts ) {

		if ( $atts['layout'] == 'info-below' && $atts['hover_animation_info-below'] == 'tilt' ) {
			wp_enqueue_script( 'tilt');
		}
	}

	add_action( 'reina_core_action_portfolio_list_load_assets', 'reina_core_include_tilt_scripts' );
}

if ( ! function_exists( 'reina_core_register_tilt_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function reina_core_register_tilt_scripts( $scripts ) {

		$scripts['tilt'] = array(
				'registered'	=> false,
				'url'			=> REINA_CORE_INC_URL_PATH . '/post-types/portfolio/shortcodes/portfolio-list/variations/info-below/hover-animations/tilt/assets/js/plugins/tilt.jquery.min.js',
				'dependency'	=> array( 'jquery' )
			);

		return $scripts;
	}

	add_filter( 'reina_core_filter_portfolio_list_register_assets', 'reina_core_register_tilt_scripts' );
}
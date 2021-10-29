<?php

if ( ! function_exists( 'reina_core_add_mobile_logo_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 * @param object $header_tab
	 */
	function reina_core_add_mobile_logo_options( $page, $header_tab ) {

		if ( $page ) {
			
			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Logo Options', 'reina-core' ),
					'description' => esc_html__( 'Set options for mobile headers', 'reina-core' )
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'reina-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'reina-core' )
					)
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_padding',
					'title'       => esc_html__( 'Mobile Logo Padding', 'reina-core' ),
					'description' => esc_html__( 'Enter mobile logo padding value (top right bottom left)', 'reina-core' ),
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_mobile_logo_main',
					'title'       => esc_html__( 'Mobile Logo - Main', 'reina-core' ),
					'description' => esc_html__( 'Choose main mobile logo image', 'reina-core' ),
					'default_value' => defined( 'REINA_ASSETS_ROOT' ) ? REINA_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'    => 'no'
				)
			);
			
			do_action( 'reina_core_action_after_mobile_logo_options_map', $page );
		}
	}
	
	add_action( 'reina_core_action_after_header_logo_options_map', 'reina_core_add_mobile_logo_options', 10, 2 );
}

<?php

if ( ! function_exists( 'reina_core_add_logo_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function reina_core_add_logo_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => REINA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'logo',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Logo', 'reina-core' ),
				'description' => esc_html__( 'Global Logo Options', 'reina-core' ),
				'layout'      => 'tabbed'
			)
		);

		if ( $page ) {

			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Logo Options', 'reina-core' ),
					'description' => esc_html__( 'Set options for initial headers', 'reina-core' )
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_height',
					'title'       => esc_html__( 'Logo Height', 'reina-core' ),
					'description' => esc_html__( 'Enter logo height', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'reina-core' )
					)
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_main',
					'title'         => esc_html__( 'Logo - Main', 'reina-core' ),
					'description'   => esc_html__( 'Choose main logo image', 'reina-core' ),
					'default_value' => defined( 'REINA_ASSETS_ROOT' ) ? REINA_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no'
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'reina-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'reina-core' ),
					'multiple'    => 'no'
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'reina-core' ),
					'description' => esc_html__( 'Choose light logo image', 'reina-core' ),
					'multiple'    => 'no'
				)
			);

			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_header_logo_options_map', $page, $header_tab );
		}
	}

	add_action( 'reina_core_action_default_options_init', 'reina_core_add_logo_options', reina_core_get_admin_options_map_position( 'logo' ) );
}
<?php

if ( ! function_exists( 'reina_core_add_timetable_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function reina_core_add_timetable_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => REINA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'timetable',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Timetable', 'reina-core' ),
				'description' => esc_html__( 'Global Timetable Options', 'reina-core' )
			)
		);

		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_timetable_predefined_style',
					'title'         => esc_html__( 'Enable Predefined Style', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set predefined style for timetable plugin', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no'
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_timetable_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'reina-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for timetable single pages', 'reina-core' ),
					'default_value' => 'no-sidebar',
					'options'       => reina_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);

			$custom_sidebars = reina_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_timetable_single_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'reina-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on timetable single pages', 'reina-core' ),
						'options'     => $custom_sidebars
					)
				);
			}

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_timetable_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'reina-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar for blog single', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'items_space' )
				)
			);

			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_timetable_options_map', $page );
		}
	}

	add_action( 'reina_core_action_default_options_init', 'reina_core_add_timetable_options', reina_core_get_admin_options_map_position( 'timetable' ) );
}

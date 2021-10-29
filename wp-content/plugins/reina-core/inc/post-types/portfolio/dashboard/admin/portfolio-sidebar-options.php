<?php

if ( ! function_exists( 'reina_core_add_portfolio_archive_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for portfolio archive module
	 */
	function reina_core_add_portfolio_archive_sidebar_options( $tab ) {
		
		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_archive_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'reina-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for portfolio archives', 'reina-core' ),
					'default_value' => 'no-sidebar',
					'options'       => reina_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);
			
			$custom_sidebars = reina_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_portfolio_archive_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'reina-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on portfolio archives', 'reina-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_archive_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'reina-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'reina_core_action_after_portfolio_options_archive', 'reina_core_add_portfolio_archive_sidebar_options' );
}

if ( ! function_exists( 'reina_core_add_portfolio_single_sidebar_options' ) ) {
	/**
	 * Function that add sidebar options for portfolio single module
	 */
	function reina_core_add_portfolio_single_sidebar_options( $tab ) {
		
		if ( $tab ) {
			$tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_portfolio_single_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'reina-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for portfolio singles', 'reina-core' ),
					'default_value' => 'no-sidebar',
					'options'       => reina_core_get_select_type_options_pool( 'sidebar_layouts', false )
				)
			);
			
			$custom_sidebars = reina_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_portfolio_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'reina-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on portfolio singles', 'reina-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_single_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'reina-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'items_space' )
				)
			);
		}
	}
	
	add_action( 'reina_core_action_after_portfolio_options_single', 'reina_core_add_portfolio_single_sidebar_options' );
}
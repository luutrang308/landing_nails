<?php

if ( ! function_exists( 'reina_core_add_portfolio_single_sidebar_meta_boxes' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function reina_core_add_portfolio_single_sidebar_meta_boxes( $page ) {
		
		if ( $page ) {
			
			$sidebar_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-sidebar',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Sidebar Settings', 'reina-core' ),
					'description' => esc_html__( 'Portfolio sidebar settings', 'reina-core' )
				)
			);
			
			$sidebar_tab->add_field_element(
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
				$sidebar_tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_portfolio_single_custom_sidebar',
						'title'         => esc_html__( 'Custom Sidebar', 'reina-core' ),
						'description'   => esc_html__( 'Choose a custom sidebar to display on portfolio singles', 'reina-core' ),
						'options'       => $custom_sidebars
					)
				);
			}
			
			$sidebar_tab->add_field_element(
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
	
	add_action( 'reina_core_action_after_portfolio_meta_box_map', 'reina_core_add_portfolio_single_sidebar_meta_boxes', 12 );
}
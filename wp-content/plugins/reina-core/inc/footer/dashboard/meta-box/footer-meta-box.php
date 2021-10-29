<?php

if ( ! function_exists( 'reina_core_add_page_footer_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function reina_core_add_page_footer_meta_box( $page ) {
		
		if ( $page ) {
			$custom_sidebars = reina_core_get_custom_sidebars();
			$footer_columns  = apply_filters( 'reina_core_filter_footer_areas_columns_size', array() );
			
			$footer_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-footer',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Footer Settings', 'reina-core' ),
					'description' => esc_html__( 'Footer layout settings', 'reina-core' )
				)
			);
			
			$footer_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_footer',
					'title'       => esc_html__( 'Enable Page Footer', 'reina-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page footer', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$footer_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_footer_skin',
					'title'       => esc_html__( 'Footer Skin', 'reina-core' ),
					'description' => esc_html__( 'Choose a predefined footer style for footer elements', 'reina-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'reina-core' ),
						'none'  => esc_html__( 'None', 'reina-core' ),
						'light' => esc_html__( 'Light', 'reina-core' ),
						'dark'  => esc_html__( 'Dark', 'reina-core' )
					)
				)
			);
			
			$page_footer_section = $footer_tab->add_section_element(
				array(
					'name'       => 'qodef_page_footer_section',
					'title'      => esc_html__( 'Footer Area', 'reina-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_footer' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			// General Footer Area Options
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_uncovering_footer',
					'title'       => esc_html__( 'Enable Uncovering Footer', 'reina-core' ),
					'description' => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_footer_newsletter_color',
					'title'       => esc_html__( 'Newsletter Form Background Color', 'reina-core' )
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_footer_area_background_svg',
					'title'       => esc_html__( 'Footer Area Background SVG Image', 'reina-core' )
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_footer_area_background_svg_fill',
					'title'       => esc_html__( 'SVG Icon Fill', 'reina-core' ),
					'description' => esc_html__( 'Choose fill color for SVG icon', 'reina-core' ),
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_footer_area_background_svg_stroke',
					'title'       => esc_html__( 'SVG Icon Stroke', 'reina-core' ),
					'description' => esc_html__( 'Choose stroke color for SVG icon', 'reina-core' ),
				)
			);
			
			// Top Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_top_footer_area',
					'title'       => esc_html__( 'Enable Top Footer Area', 'reina-core' ),
					'description' => esc_html__( 'Use this option to enable/disable top footer area', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$top_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_section',
					'title'      => esc_html__( 'Top Footer Area', 'reina-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_top_footer_area' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_in_grid',
					'title'         => esc_html__( 'Top Footer Area in Grid', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set page top footer area to be in grid', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			if ( isset( $footer_columns['footer_top_sidebars_number'] ) && ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				for ( $i = 1; $i <= intval( $footer_columns['footer_top_sidebars_number'] ); $i ++ ) {
					$top_footer_area_section->add_field_element(
						array(
							'field_type'  => 'select',
							'name'        => 'qodef_footer_top_area_custom_widget_' . $i,
							'title'       => sprintf( esc_html__( 'Custom Footer Top Area - Column %s', 'reina-core' ), $i ),
							'description' => sprintf( esc_html__( 'Widgets added here will appear in the %s column of top footer area', 'reina-core' ), $i ),
							'options'     => $custom_sidebars
						)
					);
				}
			}
			
			$top_footer_area_styles_section = $top_footer_area_section->add_section_element(
				array(
					'name'       => 'qodef_top_footer_area_styles_section',
					'title'      => esc_html__( 'Top Footer Area Styles', 'reina-core' )
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_top_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'reina-core' )
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_top_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'reina-core' ),
					'multiple'   => 'no'
				)
			);
			
			// Bottom Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_enable_bottom_footer_area',
					'title'         => esc_html__( 'Enable Bottom Footer Area', 'reina-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable bottom footer area', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			$bottom_footer_area_section = $page_footer_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_section',
					'title'      => esc_html__( 'Bottom Footer Area', 'reina-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_bottom_footer_area' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);
			
			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_bottom_area_in_grid',
					'title'         => esc_html__( 'Bottom Footer Area in Grid', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set page bottom footer area to be in grid', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'no_yes' )
				)
			);
			
			if ( isset( $footer_columns['footer_bottom_sidebars_number'] ) && ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				for ( $i = 1; $i <= intval( $footer_columns['footer_bottom_sidebars_number'] ); $i ++ ) {
					$bottom_footer_area_section->add_field_element(
						array(
							'field_type'  => 'select',
							'name'        => 'qodef_footer_bottom_area_custom_widget_' . $i,
							'title'       => sprintf( esc_html__( 'Custom Footer Bottom Area - Column %s', 'reina-core' ), $i ),
							'description' => sprintf( esc_html__( 'Widgets added here will appear in the %s column of bottom footer area', 'reina-core' ), $i ),
							'options'     => $custom_sidebars
						)
					);
				}
			}
			
			$bottom_footer_area_styles_section = $bottom_footer_area_section->add_section_element(
				array(
					'name'       => 'qodef_bottom_footer_area_styles_section',
					'title'      => esc_html__( 'Bottom Footer Area Styles', 'reina-core' )
				)
			);
			
			$bottom_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_bottom_footer_area_background_color',
					'title'      => esc_html__( 'Background Color', 'reina-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_page_footer_meta_box_map', $footer_tab );
		}
	}
	
	add_action( 'reina_core_action_after_general_meta_box_map', 'reina_core_add_page_footer_meta_box' );
}

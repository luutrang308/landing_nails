<?php

if ( ! function_exists( 'reina_core_add_page_footer_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function reina_core_add_page_footer_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => REINA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'footer',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Footer', 'reina-core' ),
				'description' => esc_html__( 'Global Footer Options', 'reina-core' )
			)
		);
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_footer',
					'title'         => esc_html__( 'Enable Page Footer', 'reina-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page footer', 'reina-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_footer_skin',
					'title'       => esc_html__( 'Footer Skin', 'reina-core' ),
					'description' => esc_html__( 'Choose a predefined footer style for footer elements', 'reina-core' ),
					'options'     => array(
						'none'  => esc_html__( 'None', 'reina-core' ),
						'light' => esc_html__( 'Light', 'reina-core' ),
						'dark'  => esc_html__( 'Dark', 'reina-core' )
					)
				)
			);
			
			$page_footer_section = $page->add_section_element(
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
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_uncovering_footer',
					'title'         => esc_html__( 'Enable Uncovering Footer', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'reina-core' ),
					'default_value' => 'no'
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'textarea',
					'name'          => 'qodef_footer_area_background_svg',
					'title'         => esc_html__( 'Footer Area Background SVG Icon', 'reina-core' ),
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'text',
					'name'          => 'qodef_footer_area_background_svg_size',
					'title'         => esc_html__( 'SVG Icon Size', 'reina-core' ),
					'description'   => esc_html__( 'Enter the value for footer background SVG icon size', 'reina-core' ),
					'args'          => array(
						'suffix' => esc_html__( '% or px', 'reina-core' )
					)
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
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_footer_newsletter',
					'title'         => esc_html__( 'Enable Page Footer Newsletter', 'reina-core' ),
					'default_value' => 'no'
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_footer_newsletter_form',
					'title'      => esc_html__( 'Choose Newsletter Form', 'reina-core' ),
					'options'    => function_exists( 'reina_core_get_contact_form_7_forms' ) ? reina_core_get_contact_form_7_forms() : array(),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_footer_newsletter' => array(
								'values'        => 'yes',
								'default_value' => 'no'
							)
						)
					)
				)
			);
			
			$page_footer_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_footer_newsletter_color',
					'title'      => esc_html__( 'Newsletter Form Background Color', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_footer_newsletter' => array(
								'values'        => 'yes',
								'default_value' => 'no'
							)
						)
					)
				)
			);
			
			// Top Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_top_footer_area',
					'title'         => esc_html__( 'Enable Top Footer Area', 'reina-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable top footer area', 'reina-core' ),
					'default_value' => 'yes'
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
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_top_area_in_grid',
					'title'         => esc_html__( 'Top Footer Area In Grid', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set page top footer area to be in grid', 'reina-core' ),
					'default_value' => 'yes'
				)
			);
			
			$top_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_top_area_columns',
					'title'         => esc_html__( 'Top Footer Area Columns', 'reina-core' ),
					'description'   => esc_html__( 'Choose number of columns for top footer area', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'columns_number', true, array( '5', '6' ) ),
					'default_value' => '4'
				)
			);
			
			$top_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_top_area_grid_gutter',
					'title'       => esc_html__( 'Top Footer Area Grid Gutter', 'reina-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for top footer area', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'items_space' )
				)
			);
			
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
					'title'      => esc_html__( 'Background Color', 'reina-core' ),
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_top_footer_area_background_image',
					'title'      => esc_html__( 'Background Image', 'reina-core' ),
				)
			);
			
			$top_footer_area_styles_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_top_footer_area_widgets_margin_bottom',
					'title'       => esc_html__( 'Widgets Margin Bottom', 'reina-core' ),
					'description' => esc_html__( 'Set space value between widgets', 'reina-core' ),
					
				)
			);
			
			// Bottom Footer Area Section
			
			$page_footer_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_bottom_footer_area',
					'title'         => esc_html__( 'Enable Bottom Footer Area', 'reina-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable bottom footer area', 'reina-core' ),
					'default_value' => 'yes'
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
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_footer_bottom_area_in_grid',
					'title'         => esc_html__( 'Bottom Footer Area In Grid', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set page bottom footer area to be in grid', 'reina-core' ),
					'default_value' => 'yes'
				)
			);
			
			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_set_footer_bottom_area_columns',
					'title'         => esc_html__( 'Bottom Footer Area Columns', 'reina-core' ),
					'description'   => esc_html__( 'Choose number of columns for bottom footer area', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'columns_number', true, array( '3', '4', '5', '6' ) ),
					'default_value' => '1'
				)
			);
			
			$bottom_footer_area_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_footer_bottom_area_grid_gutter',
					'title'       => esc_html__( 'Bottom Footer Area Grid Gutter', 'reina-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between columns for bottom footer area', 'reina-core' ),
					'options'     => reina_core_get_select_type_options_pool( 'items_space' )
				)
			);
			
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
			do_action( 'reina_core_action_after_page_footer_options_map', $page );
		}
	}
	
	add_action( 'reina_core_action_default_options_init', 'reina_core_add_page_footer_options', reina_core_get_admin_options_map_position( 'footer' ) );
}

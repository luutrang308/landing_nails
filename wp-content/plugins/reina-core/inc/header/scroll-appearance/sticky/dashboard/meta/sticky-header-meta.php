<?php

if ( ! function_exists( 'reina_core_add_sticky_header_meta_options' ) ) {
	/**
	 * Function that add additional meta box options for current module
	 *
	 * @param object $section
	 * @param array $custom_sidebars
	 */
	function reina_core_add_sticky_header_meta_options( $section, $custom_sidebars ) {
		
		if ( $section ) {
			
			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_skin',
					'title'       => esc_html__( 'Sticky Header Skin', 'reina-core' ),
					'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'reina-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'reina-core' ),
						'none'  => esc_html__( 'None', 'reina-core' ),
						'light' => esc_html__( 'Light', 'reina-core' ),
						'dark'  => esc_html__( 'Dark', 'reina-core' ),
					),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_scroll_amount',
					'title'       => esc_html__( 'Sticky Scroll Amount', 'reina-core' ),
					'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'reina-core' ),
					),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_side_padding',
					'title'       => esc_html__( 'Sticky Header Side Padding', 'reina-core' ),
					'description' => esc_html__( 'Enter side padding for sticky header area', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'reina-core' ),
					),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_background_color',
					'title'       => esc_html__( 'Sticky Header Background Color', 'reina-core' ),
					'description' => esc_html__( 'Enter sticky header background color', 'reina-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);

			$section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_sticky_header_enable_border',
					'title'         => esc_html__( 'Enable Border', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool('no_yes', true),
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_border_color',
					'title'       => esc_html__( 'Sticky Header Border Color', 'reina-core' ),
					'description' => esc_html__( 'Enter sticky header border color', 'reina-core' ),
					'dependency'  => array(
						'show' => array(
							'qodef_sticky_header_enable_border' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);
			
			$section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_one',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area One', 'reina-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area one', 'reina-core' ),
					'options'     => $custom_sidebars,
					'dependency'  => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);

            $section->add_field_element(
                array(
                    'field_type'  => 'select',
                    'name'        => 'qodef_sticky_header_custom_widget_area_two',
                    'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area Two', 'reina-core' ),
                    'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area two', 'reina-core' ),
                    'options'     => $custom_sidebars,
                    'dependency'  => array(
                        'show' => array(
                            'qodef_header_scroll_appearance' => array(
                                'values'        => 'sticky',
                                'default_value' => '',
                            ),
                        ),
                    ),
                )
            );
		}
	}
	
	add_action( 'reina_core_action_after_header_scroll_appearance_meta_options_map', 'reina_core_add_sticky_header_meta_options', 10, 2 );
}

if ( ! function_exists( 'reina_core_add_sticky_header_logo_meta_options' ) ) {
	/**
	 * Function that add additional header logo meta box options
	 *
	 * @param object $logo_tab
	 * @param array $header_logo_section
	 */
	function reina_core_add_sticky_header_logo_meta_options( $logo_tab, $header_logo_section ) {
		
		if ( $header_logo_section ) {
			
			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'reina-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'reina-core' ),
					'multiple'    => 'no',
				)
			);
		}
	}
	
	add_action( 'reina_core_action_after_page_logo_meta_map', 'reina_core_add_sticky_header_logo_meta_options', 10, 2 );
}

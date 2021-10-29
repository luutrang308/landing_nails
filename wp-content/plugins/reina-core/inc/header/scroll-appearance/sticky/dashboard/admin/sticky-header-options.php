<?php

if ( ! function_exists( 'reina_core_add_sticky_header_options' ) ) {
	/**
	 * Function that add additional header layout global options
	 *
	 * @param object $page
	 * @param object $section
	 */
	function reina_core_add_sticky_header_options( $page, $section ) {
		
		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_sticky_header_skin',
				'title'       => esc_html__( 'Sticky Header Skin', 'reina-core' ),
				'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'reina-core' ),
				'options'     => array(
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
				'options'       => reina_core_get_select_type_options_pool('no_yes', false),
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
						'qodef_header_scroll_appearance' => array(
							'values'        => 'sticky',
							'default_value' => '',
						),
					),
				),
			)
		);

	}
	
	add_action( 'reina_core_action_after_header_scroll_appearance_options_map', 'reina_core_add_sticky_header_options', 10, 2 );
}

if ( ! function_exists( 'reina_core_add_sticky_header_logo_options' ) ) {
	/**
	 * Function that add additional header logo options
	 *
	 * @param object $page
	 * @param array $header_tab
	 */
	function reina_core_add_sticky_header_logo_options( $page, $header_tab ) {
		
		if ( $header_tab ) {
			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'reina-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'reina-core' ),
					'multiple'    => 'no'
				)
			);
		}
	}
	
	add_action( 'reina_core_action_after_header_logo_options_map', 'reina_core_add_sticky_header_logo_options', 10, 2 );
}

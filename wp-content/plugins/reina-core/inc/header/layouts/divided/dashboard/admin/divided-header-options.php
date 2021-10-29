<?php

if ( ! function_exists( 'reina_core_add_divided_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function reina_core_add_divided_header_options( $page, $general_header_tab ) {
		
		$section = $general_header_tab->add_section_element(
			array(
				'name'       => 'qodef_divided_header_section',
				'title'      => esc_html__( 'Divided Header', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'divided',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'yesno',
				'name'        => 'qodef_divided_header_in_grid',
				'title'         => esc_html__( 'Content In Grid', 'reina-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'reina-core' ),
				'default_value' => 'no',
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_height',
				'title'       => esc_html__( 'Header Height', 'reina-core' ),
				'description' => esc_html__( 'Enter header height', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'reina-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'reina-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'reina-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_divided_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'reina-core' ),
				'description' => esc_html__( 'Enter header background color', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'reina-core' )
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_divided_header_enable_border',
				'title'         => esc_html__( 'Enable Border', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool('no_yes', false),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'color',
				'name'          => 'qodef_divided_header_border_color',
				'title'         => esc_html__( 'Border Color', 'reina-core' ),
				'dependency'  => array(
					'show'    => array(
						'qodef_divided_header_enable_border' => array(
							'values' => 'yes',
							'default_value' => ''
						)
					)
				)
			)
		);

	}
	
	add_action( 'reina_core_action_after_header_options_map', 'reina_core_add_divided_header_options', 10, 2 );
}

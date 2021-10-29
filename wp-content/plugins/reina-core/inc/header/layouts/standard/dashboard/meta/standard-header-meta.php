<?php

if ( ! function_exists( 'reina_core_add_standard_header_meta' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function reina_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'reina-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'reina-core' ),
				'default_value' => '',
				'options'       => reina_core_get_select_type_options_pool( 'no_yes' )
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
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
				'name'        => 'qodef_standard_header_side_padding',
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
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'reina-core' ),
				'description' => esc_html__( 'Enter header background color', 'reina-core' )
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_menu_position',
				'title'         => esc_html__( 'Menu position', 'reina-core' ),
				'default_value' => '',
				'options'       => array(
					''       => esc_html__( 'Default', 'reina-core' ),
					'left'   => esc_html__( 'Left', 'reina-core' ),
					'center' => esc_html__( 'Center', 'reina-core' ),
					'right'  => esc_html__( 'Right', 'reina-core' ),
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_standard_header_enable_border',
				'title'         => esc_html__( 'Enable Border', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool('no_yes', true),
			)
		);

		$section->add_field_element(
			array(
				'field_type'    => 'color',
				'name'          => 'qodef_standard_header_border_color',
				'title'         => esc_html__( 'Border Color', 'reina-core' ),
			)
		);

	}
	
	add_action( 'reina_core_action_after_page_header_meta_map', 'reina_core_add_standard_header_meta' );
}

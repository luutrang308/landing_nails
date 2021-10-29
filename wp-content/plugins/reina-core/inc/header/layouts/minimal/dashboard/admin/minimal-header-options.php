<?php

if ( ! function_exists( 'reina_core_add_minimal_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_header_tab
	 */
	function reina_core_add_minimal_header_options( $page, $general_header_tab ) {
		
		$section = $general_header_tab->add_section_element(
			array(
				'name'       => 'qodef_minimal_header_section',
				'title'      => esc_html__( 'Minimal Header', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'minimal',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'yesno',
				'name'        => 'qodef_minimal_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'reina-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'reina-core' ),
				'default_value' => 'no',
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_height',
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
				'name'        => 'qodef_minimal_header_side_padding',
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
				'name'        => 'qodef_minimal_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'reina-core' ),
				'description' => esc_html__( 'Enter header background color', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'reina-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'textarea',
				'name'        => 'qodef_minimal_header_background_icon',
				'title'       => esc_html__( 'Header Background SVG Icon', 'reina-core' ),
				'description' => esc_html__( 'Enter your Header icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'reina-core' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_minimal_header_background_icon_size',
				'title'       => esc_html__( 'SVG Icon Size', 'reina-core' ),
				'description' => esc_html__( 'Enter size for Header Background SVG Icon', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( '% or px', 'reina-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_minimal_header_background_svg_fill',
				'title'       => esc_html__( 'SVG Icon Fill', 'reina-core' ),
				'description' => esc_html__( 'Choose fill color for SVG icon', 'reina-core' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_minimal_header_background_svg_stroke',
				'title'       => esc_html__( 'SVG Icon Stroke', 'reina-core' ),
				'description' => esc_html__( 'Choose stroke color for SVG icon', 'reina-core' )
			)
		);

	}
	
	add_action( 'reina_core_action_after_header_options_map', 'reina_core_add_minimal_header_options', 10, 2 );
}

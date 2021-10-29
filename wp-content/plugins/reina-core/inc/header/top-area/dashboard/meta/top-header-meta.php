<?php
if ( ! function_exists( 'reina_core_add_top_area_meta_options' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function reina_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => reina_core_dependency_for_top_area_options(),
							'default_value' => ''
						)
					)
				)
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'reina-core' ),
				'description' => esc_html__( 'Enable top area', 'reina-core' ),
				'options'     => reina_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'reina-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'reina-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			)
		);
		
		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'reina-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'reina-core' ),
				'default_value' => 'no',
			)
		);
		
		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header_skin',
				'title'       => esc_html__( 'Top Area Skin', 'reina-core' ),
				'description' => esc_html__( 'Choose a predefined style for top area elements', 'reina-core' ),
				'options'     => array(
					''      => esc_html__( 'Default', 'reina-core' ),
					'none'  => esc_html__( 'None', 'reina-core' ),
					'light' => esc_html__( 'Light', 'reina-core' ),
					'dark'  => esc_html__( 'Dark', 'reina-core' )
				)
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'reina-core' ),
				'description' => esc_html__( 'Choose top area background color', 'reina-core' )
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'reina-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'reina-core' )
				)
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'reina-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'reina-core' )
				)
			)
		);
	}

	add_action( 'reina_core_action_after_page_header_meta_map', 'reina_core_add_top_area_meta_options', 20 );
}

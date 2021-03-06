<?php

if ( ! function_exists( 'reina_core_add_general_page_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 *
	 * @param object $page
	 */
	function reina_core_add_general_page_meta_box( $page ) {

		$general_tab = $page->add_tab_element(
			array(
				'name'        => 'tab-page',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Page Settings', 'reina-core' ),
				'description' => esc_html__( 'General page layout settings', 'reina-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_page_background_color',
				'title'       => esc_html__( 'Page Background Color', 'reina-core' ),
				'description' => esc_html__( 'Set background color', 'reina-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_page_background_image',
				'title'       => esc_html__( 'Page Background Image', 'reina-core' ),
				'description' => esc_html__( 'Set background image', 'reina-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_repeat',
				'title'       => esc_html__( 'Page Background Image Repeat', 'reina-core' ),
				'description' => esc_html__( 'Set background image repeat', 'reina-core' ),
				'options'     => array(
					''          => esc_html__( 'Default', 'reina-core' ),
					'no-repeat' => esc_html__( 'No Repeat', 'reina-core' ),
					'repeat'    => esc_html__( 'Repeat', 'reina-core' ),
					'repeat-x'  => esc_html__( 'Repeat-x', 'reina-core' ),
					'repeat-y'  => esc_html__( 'Repeat-y', 'reina-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_size',
				'title'       => esc_html__( 'Page Background Image Size', 'reina-core' ),
				'description' => esc_html__( 'Set background image size', 'reina-core' ),
				'options'     => array(
					''        => esc_html__( 'Default', 'reina-core' ),
					'contain' => esc_html__( 'Contain', 'reina-core' ),
					'cover'   => esc_html__( 'Cover', 'reina-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_page_background_attachment',
				'title'       => esc_html__( 'Page Background Image Attachment', 'reina-core' ),
				'description' => esc_html__( 'Set background image attachment', 'reina-core' ),
				'options'     => array(
					''       => esc_html__( 'Default', 'reina-core' ),
					'fixed'  => esc_html__( 'Fixed', 'reina-core' ),
					'scroll' => esc_html__( 'Scroll', 'reina-core' )
				)
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding',
				'title'       => esc_html__( 'Page Content Padding', 'reina-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'reina-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_page_content_padding_mobile',
				'title'       => esc_html__( 'Page Content Padding Mobile', 'reina-core' ),
				'description' => esc_html__( 'Set padding that will be applied for page content on mobile screens (1024px and below) in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'reina-core' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_boxed',
				'title'         => esc_html__( 'Boxed Layout', 'reina-core' ),
				'description'   => esc_html__( 'Set boxed layout', 'reina-core' ),
				'default_value' => '',
				'options'       => reina_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$boxed_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_boxed_section',
				'title'      => esc_html__( 'Boxed Layout Section', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_boxed' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$boxed_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_boxed_background_color',
				'title'       => esc_html__( 'Boxed Background Color', 'reina-core' ),
				'description' => esc_html__( 'Set boxed background color', 'reina-core' )
			)
		);

        $boxed_section->add_field_element(
            array(
                'field_type'  => 'image',
                'name'        => 'qodef_boxed_background_pattern',
                'title'       => esc_html__( 'Boxed Background Pattern', 'reina-core' ),
                'description' => esc_html__( 'Set boxed background pattern', 'reina-core' )
            )
        );

        $boxed_section->add_field_element(
            array(
                'field_type'  => 'select',
                'name'        => 'qodef_boxed_background_pattern_behavior',
                'title'       => esc_html__( 'Boxed Background Pattern Behavior', 'reina-core' ),
                'description' => esc_html__( 'Set boxed background pattern behavior', 'reina-core' ),
                'options'     => array(
                    ''       => esc_html__( 'Default', 'reina-core' ),
                    'fixed'  => esc_html__( 'Fixed', 'reina-core' ),
                    'scroll' => esc_html__( 'Scroll', 'reina-core' )
                ),
            )
        );

		$general_tab->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_passepartout',
				'title'         => esc_html__( 'Passepartout', 'reina-core' ),
				'description'   => esc_html__( 'Enabling this option will display a passepartout around website content', 'reina-core' ),
				'default_value' => '',
				'options'       => reina_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$passepartout_section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_passepartout_section',
				'dependency' => array(
					'hide' => array(
						'qodef_passepartout' => array(
							'values'        => 'no',
							'default_value' => ''
						)
					)
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_passepartout_color',
				'title'       => esc_html__( 'Passepartout Color', 'reina-core' ),
				'description' => esc_html__( 'Choose background color for passepartout', 'reina-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'image',
				'name'        => 'qodef_passepartout_image',
				'title'       => esc_html__( 'Passepartout Background Image', 'reina-core' ),
				'description' => esc_html__( 'Set background image for passepartout', 'reina-core' )
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size',
				'title'       => esc_html__( 'Passepartout Size', 'reina-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'reina-core' )
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_passepartout_size_responsive',
				'title'       => esc_html__( 'Passepartout Responsive Size', 'reina-core' ),
				'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (1024px and below)', 'reina-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'reina-core' )
				)
			)
		);

		$passepartout_section->add_field_element(
			array(
				'field_type'    => 'select',
				'name'          => 'qodef_content_passepartout',
				'title'         => esc_html__( 'Enable Passepartout For Content Section Only?', 'reina-core' ),
				'description'   => esc_html__( 'Enabling this option will show a passepartout around content section', 'reina-core' ),
				'default_value' => '',
				'options'       => reina_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$general_tab->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_content_width',
				'title'       => esc_html__( 'Initial Width of Content', 'reina-core' ),
				'description' => esc_html__( 'Choose the initial width of content which is in grid (applies to pages set to "Default Template" and rows set to "In Grid")', 'reina-core' ),
				'options'     => reina_core_get_select_type_options_pool( 'content_width' )
			)
		);

		$general_tab->add_field_element( array(
			'field_type'    => 'yesno',
			'default_value' => 'no',
			'name'          => 'qodef_content_behind_header',
			'title'         => esc_html__( 'Always put content behind header', 'reina-core' ),
			'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'reina-core' ),
		) );

		// Hook to include additional options after module options
		do_action( 'reina_core_action_after_general_page_meta_box_map', $general_tab );
	}

	add_action( 'reina_core_action_after_general_meta_box_map', 'reina_core_add_general_page_meta_box', 9 );
}

if ( ! function_exists( 'reina_core_add_general_page_meta_box_callback' ) ) {
	/**
	 * Function that set current meta box callback as general callback functions
	 *
	 * @param array $callbacks
	 *
	 * @return array
	 */
	function reina_core_add_general_page_meta_box_callback( $callbacks ) {
		$callbacks['page'] = 'reina_core_add_general_page_meta_box';
		
		return $callbacks;
	}
	
	add_filter( 'reina_core_filter_general_meta_box_callbacks', 'reina_core_add_general_page_meta_box_callback' );
}

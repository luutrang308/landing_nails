<?php

if ( ! function_exists( 'reina_core_add_page_title_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function reina_core_add_page_title_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => REINA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'title',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Title', 'reina-core' ),
				'description' => esc_html__( 'Global Title Options', 'reina-core' )
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_title',
					'title'         => esc_html__( 'Enable Page Title', 'reina-core' ),
					'description'   => esc_html__( 'Use this option to enable/disable page title', 'reina-core' ),
					'default_value' => 'yes'
				)
			);

			$page_title_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'reina-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_title_layout',
					'title'         => esc_html__( 'Title Layout', 'reina-core' ),
					'description'   => esc_html__( 'Choose a title layout', 'reina-core' ),
					'options'       => apply_filters( 'reina_core_filter_title_layout_options', array() ),
					'default_value' => 'standard'
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_set_page_title_area_in_grid',
					'title'         => esc_html__( 'Page Title In Grid', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set page title area to be in grid', 'reina-core' ),
					'default_value' => 'yes'
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'reina-core' ),
					'description' => esc_html__( 'Enter title height', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'reina-core' )
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height_on_smaller_screens',
					'title'       => esc_html__( 'Height on Smaller Screens', 'reina-core' ),
					'description' => esc_html__( 'Enter title height to be displayed on smaller screens with active mobile header', 'reina-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'reina-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'reina-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'reina-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'reina-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'reina-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'reina-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'reina-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_page_title_background_svg',
					'title'       => esc_html__( 'Background SVG', 'reina-core' ),
					'description' => esc_html__( 'Enter page title area background svg code', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_background_svg_stroke',
					'title'      => esc_html__( 'Svg Stroke', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_background_svg_fill',
					'title'      => esc_html__( 'Svg Fill', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'reina-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_tag',
					'title'         => esc_html__( 'Title Tag', 'reina-core' ),
					'description'   => esc_html__( 'Enabling this option will set title tag', 'reina-core' ),
					'options'       => reina_core_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h1'
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_text_alignment',
					'title'         => esc_html__( 'Text Alignment', 'reina-core' ),
					'options'       => array(
						'left'   => esc_html__( 'Left', 'reina-core' ),
						'center' => esc_html__( 'Center', 'reina-core' ),
						'right'  => esc_html__( 'Right', 'reina-core' )
					),
					'default_value' => 'left'
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'reina-core' ),
					'options'       => array(
						'header-bottom' => esc_html__( 'From Bottom of Header', 'reina-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'reina-core' )
					),
					'default_value' => 'header-bottom'
				)
			);

			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_page_title_options_map', $page_title_section );
		}
	}

	add_action( 'reina_core_action_default_options_init', 'reina_core_add_page_title_options', reina_core_get_admin_options_map_position( 'title' ) );
}

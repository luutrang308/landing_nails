<?php

if ( ! function_exists( 'reina_core_mobile_header_menu_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function reina_core_mobile_header_menu_options( $page ) {

		if ( $page ) {
			$mobile_menu_tab = $page->add_tab_element(
				array(
					'name'  => 'tab-mobile-header-menu',
					'icon'  => 'fa fa-cog',
					'title' => esc_html__( 'Mobile Menu Settings', 'reina-core' )
				)
			);
			
			$typography_section = $mobile_menu_tab->add_section_element(
				array(
					'name'       => 'qodef_mobile_typography_section',
					'title'      => esc_html__( 'Mobile Menu Typography', 'reina-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_mobile_header_layout' => array(
								'values'        => reina_core_dependency_for_mobile_menu_typography_options(),
								'default_value' => apply_filters( 'reina_core_filter_mobile_header_layout_default_option', '' )
							)
						)
					)
				)
			);
			
			$first_level_typography_row = $typography_section->add_row_element(
				array(
					'name'  => 'qodef_first_level_typography_row',
					'title' => esc_html__( 'Menu First Level Typography', 'reina-core' )
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_1st_lvl_color',
					'title'      => esc_html__( 'Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_1st_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_1st_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_mobile_1st_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_1st_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_1st_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_1st_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_1st_lvl_font_weight',
					'title'      => esc_html__( 'Font Weight', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_1st_lvl_text_transform',
					'title'      => esc_html__( 'Text Transform', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_1st_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row = $typography_section->add_row_element(
				array(
					'name'  => 'qodef_second_level_typography_row',
					'title' => esc_html__( 'Menu Second Level Typography', 'reina-core' )
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_2nd_lvl_color',
					'title'      => esc_html__( 'Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_2nd_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_mobile_2nd_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_mobile_2nd_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_2nd_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_2nd_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_mobile_2nd_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'reina-core' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_2nd_lvl_font_weight',
					'title'      => esc_html__( 'Font Weight', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_2nd_lvl_text_transform',
					'title'      => esc_html__( 'Text Transform', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
			
			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_mobile_2nd_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'reina-core' ),
					'options'    => reina_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3
					)
				)
			);
		}
	}

	add_action( 'reina_core_action_after_mobile_header_options_map', 'reina_core_mobile_header_menu_options' );
}
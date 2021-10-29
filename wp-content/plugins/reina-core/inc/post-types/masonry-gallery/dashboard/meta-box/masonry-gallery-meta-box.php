<?php

if ( ! function_exists( 'reina_core_add_masonry_gallery_meta_box' ) ) {
	/**
	 * Function that adds fields for masonry gallery
	 */
	function reina_core_add_masonry_gallery_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'masonry-gallery' ),
				'type'  => 'meta',
				'slug'  => 'masonry-gallery',
				'title' => esc_html__( 'Masonry Gallery Parameters', 'reina-core' ),
			)
		);
		
		if ( $page ) {
			
			$page->add_field_element( array(
				'field_type'    => 'select',
				'name'          => 'qodef_masonry_gallery_item_layout',
				'title'         => esc_html__( 'Item Layout', 'reina-core' ),
				'description'   => esc_html__( 'Choose default layout for masonry gallery item', 'reina-core' ),
				'options'       => array(
					'standard'    => esc_html__( 'Standard', 'reina-core' ),
					'simple'      => esc_html__( 'Simple', 'reina-core' ),
					'textual'     => esc_html__( 'Textual', 'reina-core' ),
				),
				'default_value' => 'standard'
			) );
			
			$page->add_field_element( array(
				'field_type'  => 'select',
				'name'        => 'qodef_masonry_gallery_item_dimension',
				'title'       => esc_html__( 'Masonry Item Dimension', 'reina-core' ),
				'description' => esc_html__( 'Choose an item dimension layout "masonry behavior" for masonry gallery list.', 'reina-core' ),
				'options'     => reina_core_get_select_type_options_pool( 'masonry_image_dimension' ),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'color',
				'name'       => 'qodef_masonry_gallery_item_background_color',
				'title'      => esc_html__( 'Background Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_title_tag',
				'title'      => esc_html__( 'Title Tag', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'title_tag' ),
				'dependency' => array(
					'hide' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'simple' ),
							'default_value' => 'standard'
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_hide_title',
				'title'      => esc_html__( 'Hide Title', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'no_yes', false ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_masonry_gallery_item_mark',
				'title'      => esc_html__( 'Mark', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'simple' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_masonry_gallery_item_tagline',
				'title'      => esc_html__( 'Tagline', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_hide_title',
				'title'      => esc_html__( 'Hide Title', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'no_yes', false ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			$page->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_masonry_gallery_item_text',
					'title'      => esc_html__( 'Text', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => array( 'textual' ),
								'default_value' => 'standard'
							)
						)
					),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_masonry_gallery_item_svg',
					'title'      => esc_html__( 'Custom SVG', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => array( 'textual' ),
								'default_value' => ''
							)
						)
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_masonry_gallery_item_svg_size',
					'title'      => esc_html__( 'SVG size (px or %)', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => array( 'textual' ),
								'default_value' => ''
							)
						)
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_masonry_gallery_item_svg_stroke',
					'title'      => esc_html__( 'SVG stroke', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => array( 'textual' ),
								'default_value' => ''
							)
						)
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_masonry_gallery_item_svg_fill',
					'title'      => esc_html__( 'SVG fill', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => array( 'textual' ),
								'default_value' => ''
							)
						)
					),
				)
			);
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_text_tag',
				'title'      => esc_html__( 'Text Tag', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'title_tag' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_masonry_gallery_item_button_label',
				'title'      => esc_html__( 'Button Label', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );

			$page->add_field_element( array(
				'field_type' => 'color',
				'name'       => 'qodef_masonry_gallery_item_button_text_color',
				'title'      => esc_html__( 'Button Text Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );

			$page->add_field_element( array(
				'field_type' => 'color',
				'name'       => 'qodef_masonry_gallery_item_button_text_hover_color',
				'title'      => esc_html__( 'Button Text Hover Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );

			$page->add_field_element( array(
				'field_type' => 'color',
				'name'       => 'qodef_masonry_gallery_item_button_background_color',
				'title'      => esc_html__( 'Button Background Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );

			$page->add_field_element( array(
				'field_type' => 'color',
				'name'       => 'qodef_masonry_gallery_item_button_background_hover_color',
				'title'      => esc_html__( 'Button Hover Background Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => 'standard'
						)
					)
				),
			) );
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_masonry_gallery_item_link',
					'title'      => esc_html__( 'Link', 'reina-core' ),
				)
			);
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_link_target',
				'title'      => esc_html__( 'Target', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'link_target', false ),
			) );
			
			$page->add_field_element( array(
				'field_type' => 'select',
				'name'       => 'qodef_masonry_gallery_item_alignment',
				'title'      => esc_html__( 'Content Alignment', 'reina-core' ),
				'options'    => array(
					''       => esc_attr__( 'Left', 'reina-core' ),
					'center' => esc_attr__( 'Center', 'reina-core' ),
					'right'  => esc_attr__( 'Right', 'reina-core' )
				),
				'dependency' => array(
					'show' => array(
						'qodef_masonry_gallery_item_layout' => array(
							'values'        => array( 'textual' ),
							'default_value' => ''
						)
					)
				),
			) );
			
			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_masonry_gallery_meta_box_map', $page );
		}
	}
	
	add_action( 'reina_core_action_default_meta_boxes_init', 'reina_core_add_masonry_gallery_meta_box' );
}

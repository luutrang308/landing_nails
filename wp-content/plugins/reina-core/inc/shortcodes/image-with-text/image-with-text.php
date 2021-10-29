<?php

if ( ! function_exists( 'reina_core_add_image_with_text_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_image_with_text_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreImageWithTextShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_image_with_text_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreImageWithTextShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_image_with_text_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_image_with_text_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/image-with-text' );
			$this->set_base( 'reina_core_image_with_text' );
			$this->set_name( esc_html__( 'Image With Text', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image with text element', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' ),
			) );
			
			$options_map = reina_core_get_variations_options_map( $this->get_layouts() );
			
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'reina-core' ),
				'options'		=> $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'choose_media',
				'title'      => esc_html__( 'Media', 'reina-core' ),
				'options'    => array(
					'custom-image' => esc_html__( 'Image', 'reina-core' ),
					'custom-svg'   => esc_html__( 'Custom SVG', 'reina-core' )
				)
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_border',
				'title'      => esc_html__( 'Image Border', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool('no_yes', false),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'svg',
				'title'      => esc_html__( 'Custom SVG', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_size',
				'title'      => esc_html__( 'SVG Size', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_link',
				'title'      => esc_html__( 'SVG Link', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'svg_link_target',
				'title'      => esc_html__( 'SVG Link Target', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_fill',
				'title'      => esc_html__( 'SVG Fill Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_stroke',
				'title'      => esc_html__( 'SVG Stroke Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-svg',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'reina-core' ),
				'description'=> esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_action',
				'title'         => esc_html__( 'Image Action', 'reina-core' ),
				'options'       => array(
					''            => esc_html__( 'No Action', 'reina-core' ),
					'open-popup'  => esc_html__( 'Open Popup', 'reina-core' ),
					'custom-link' => esc_html__( 'Custom Link', 'reina-core' )
				),
				'dependency' => array(
					'show' => array(
						'choose_media' => array(
							'values'        => 'custom-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Custom Link', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Custom Link Target', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tagline',
				'title'      => esc_html__( 'Tagline', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'tagline_color',
				'title'      => esc_html__( 'Tagline Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tagline_margin_top',
				'title'      => esc_html__( 'Tagline Margin Top', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h5',
				'group'         => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'content_text',
				'title'      => esc_html__( 'Text', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'content_alignment',
				'title'      => esc_html__( 'Content Alignment', 'reina-core' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'reina-core' ),
					'left'   => esc_html__( 'Left', 'reina-core' ),
					'center' => esc_html__( 'Center', 'reina-core' ),
					'right'  => esc_html__( 'Right', 'reina-core' )
				),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'reina_core_button',
				'exclude'           => array( 'custom_class' ),
				'additional_params' => array(
					'group' => esc_html__( 'Button', 'reina-core' ),
				)
			) );
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'reina_core_image_with_text', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['svg_styles']     = $this->get_svg_styles( $atts );
			$atts['tagline_styles'] = $this->get_tagline_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['image_params']   = $this->generate_image_params( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );
			
			return reina_core_get_template_part( 'shortcodes/image-with-text', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-image-with-text';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['image_border'] ? 'qodef--has-border' : '';
			$holder_classes[] = ! empty( $atts['content_alignment'] ) ?  'qodef-alignment--' . $atts['content_alignment'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_svg_styles( $atts ) {
			$styles = array();
			
			if ( $atts['svg_size'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['svg_size'] ) ) {
					$styles[] = 'width: ' . $atts['svg_size'];
				} else {
					$styles[] = 'width: ' . intval( $atts['svg_size'] ) . 'px';
				}
			}

			if ( $atts['svg_fill'] !== '' ) {
				$styles[] = 'fill: ' . $atts['svg_fill'];
			}

			if ( $atts['svg_stroke'] !== '' ) {
				$styles[] = 'stroke: ' . $atts['svg_stroke'];
			}
			
			return $styles;
		}
		
		private function get_tagline_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['tagline_color'] ) ) {
				$styles[] = 'color: ' . $atts['tagline_color'];
			}

			if ( $atts['tagline_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['tagline_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['tagline_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['tagline_margin_top'] ) . 'px';
				}
			}
			
			return $styles;
		}

		private function get_title_styles( $atts ) {
			$styles = array();

			if ( $atts['title_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( $atts['text_margin_top'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function generate_image_params( $atts ) {
			$image = array();
			
			if ( ! empty( $atts['image'] ) ) {
				$id = $atts['image'];
				
				$image['image_id'] = intval( $id );
				$image_original    = wp_get_attachment_image_src( $id, 'full' );
				$image['url']      = $image_original[0];
				$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
				
				$image_size = trim( $atts['image_size'] );
				preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
				if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
					$image['image_size'] = $image_size;
				} elseif ( ! empty( $matches[0] ) ) {
					$image['image_size'] = array(
						$matches[0][0],
						$matches[0][1]
					);
				} else {
					$image['image_size'] = 'full';
				}
			}
			
			return $image;
		}

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'reina_core_button',
				'exclude'        => array( 'custom_class' ),
				'atts'           => $atts,
			) );

			return $params;
		}
	}
}

<?php

if ( ! function_exists( 'reina_core_add_image_section_info_shortcode' ) ) {
	/**
	 * Function that isadding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_image_section_info_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreImageSectionInfoShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_image_section_info_shortcode' );
}

if ( class_exists( 'ReinaCoreListShortcode' ) ) {
	class ReinaCoreImageSectionInfoShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_image_section_info_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_image_section_info_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/image-section-info' );
			$this->set_base( 'reina_core_image_section_info' );
			$this->set_name( esc_html__( 'Image Section Info', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays image section info', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' )
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
				'name'       => 'info_position',
				'title'      => esc_html__( 'Info Position', 'reina-core' ),
				'options'    => array(
					''      => esc_html__( 'Default', 'reina-core' ),
					'left' => esc_html__( 'Left', 'reina-core' ),
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'info_background_color',
				'title'      => esc_html__( 'Background Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear_animation',
				'title'         => esc_html__( 'Enable Appear Animation', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'yes_no', false ),
			) );
			$this->set_option( array(
				'field_type' => 'textarea_html',
				'name'       => 'svg',
				'title'      => esc_html__( 'Custom SVG', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
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
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_icon_fill',
				'title'      => esc_html__( 'SVG Fill Color', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_icon_stroke',
				'title'      => esc_html__( 'SVG Stroke Color', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_position_top',
				'title'      => esc_html__( 'SVG Position Top', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_position_left',
				'title'      => esc_html__( 'SVG Position Left', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_svg_appear_animation',
				'title'         => esc_html__( 'Enable Svg Appear Animation', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'yes_no', false ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'standard',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image_above_title',
				'title'      => esc_html__( 'Image Above Title', 'reina-core' ),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'info-on-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_above_title_position',
				'title'      => esc_html__( 'Image Above Title Position', 'reina-core' ),
				'options'    => array (
					''      => esc_html__( 'Left', 'reina-core' ),
					'right' => esc_html__( 'Right', 'reina-core' )
				),
				'dependency' => array(
					'hide' => array(
						'layout' => array(
							'values'        => 'info-on-image',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h2'
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'subtitle',
				'title'      => esc_html__( 'Subtitle', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'subtitle_color',
				'title'      => esc_html__( 'Subtitle Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'textarea_html',
				'name'       => 'text_field',
				'title'      => esc_html__( 'Text', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'reina-core' ),
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'reina_core_button',
				'exclude'           => array( 'custom_class' ),
				'additional_params' => array(
					'group' => esc_html__( 'Button', 'reina-core' ),
				)
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();

			$atts['holder_classes']         = $this->get_holder_classes( $atts );
			$atts['svg_styles']             = $this->get_svg_styles( $atts );
			$atts['info_background_styles'] = $this->get_info_background_styles( $atts );
			$atts['image_holder_classes']   = $this->get_image_holder_classes( $atts );
			$atts['title_styles']           = $this->get_title_styles( $atts );
			$atts['subtitle_styles']        = $this->get_subtitle_styles( $atts );
			$atts['text_styles']            = $this->get_text_styles( $atts );
			$atts['button_params']          = $this->generate_button_params( $atts );
			
			return reina_core_get_template_part( 'shortcodes/image-section-info', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-image-section-info';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['info_position'] ) ? 'qodef--' . esc_attr( $atts['info_position'] ) : '';
			$holder_classes[] = ( $atts['enable_appear_animation'] == 'yes' ) ? 'qodef--has-appear': '';
			$holder_classes[] = ( $atts['enable_svg_appear_animation'] == 'yes' ) ? 'qodef--draw-svg': '';
			$holder_classes = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}

		private function get_image_holder_classes( $atts ) {

			$holder_classes[] = 'qodef-m-title-image';
			$holder_classes[] = ! empty ( $atts['image_above_title_position'] ) ? 'qodef--' . $atts['image_above_title_position'] : '';
			$holder_classes = array_merge( $holder_classes );

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
			
			if ( ! empty( $atts['svg_icon_fill'] ) ) {
				$styles[] = 'fill: ' . $atts['svg_icon_fill'];
			}
			
			if ( ! empty( $atts['svg_icon_stroke'] ) ) {
				$styles[] = 'stroke: ' . $atts['svg_icon_stroke'];
			}

			if ( $atts['svg_position_top'] !== '' ) {
				$styles[] = 'top: ' . $atts['svg_position_top'];
			}

			if ( $atts['svg_position_left'] !== '' ) {
				$styles[] = 'left: ' . $atts['svg_position_left'];
			}
			
			return $styles;
		}

		private function get_info_background_styles( $atts ) {
			$styles = array();

			if ( $atts['info_background_color'] !== '' ) {
				$styles[] = 'color: ' . $atts['info_background_color'];
			}

			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_subtitle_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
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

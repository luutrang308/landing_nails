<?php

if ( ! function_exists( 'reina_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreBannerShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_banner_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreBannerShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_banner_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'reina_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'reina-core' ) );
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
				'options'       => $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'svg',
				'title'      => esc_html__( 'Custom SVG', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => array( 'link-overlay', 'simple' ),
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
						'layout' => array(
							'values'        => array( 'link-overlay', 'simple' ),
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_offset',
				'title'      => esc_html__( 'SVG Top Offset', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => array( 'link-overlay', 'simple' ),
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
						'layout' => array(
							'values'        => array( 'link-overlay', 'simple' ),
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
						'layout' => array(
							'values'        => array( 'link-overlay', 'simple' ),
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'mark',
				'title'      => esc_html__( 'Mark', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'link-overlay',
							'default_value' => ''
						)
					)
				),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'mark_color',
				'title'      => esc_html__( 'Mark Color', 'reina-core' ),'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'link-overlay',
							'default_value' => ''
						)
					)
				),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link_url',
				'title'      => esc_html__( 'Link', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear_animation',
				'title'         => esc_html__( 'Enable Appear Svg Animation', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'yes_no', false ),
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
				'field_type' => 'textarea',
				'name'       => 'text_field',
				'title'      => esc_html__( 'Text', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'text_tag',
				'title'         => esc_html__( 'Text Tag', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Content', 'reina-core' )
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
				'field_type' => 'color',
				'name'       => 'content_bg_color',
				'title'      => esc_html__( 'Content Background Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'link-button',
							'default_value' => ''
						)
					)
				)
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'reina_core_button',
				'exclude'           => array( 'custom_class', 'link', 'target' ),
				'additional_params' => array(
					'group' => esc_html__( 'Button', 'reina-core' ),
				)
			) );
			
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['svg_styles']     = $this->get_svg_styles( $atts );
			$atts['mark_styles']    = $this->get_mark_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['content_styles'] = $this->get_content_styles( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );
			
			return reina_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ( $atts['enable_appear_animation'] == 'yes' ) ? 'qodef--draw-svg qodef--draw-svg-random-delay': '';
			
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
			
			if ( ! empty( $atts['svg_offset'] ) ) {
				$styles[] = 'top: ' . $atts['svg_offset'];
			}

			if ( $atts['svg_fill'] !== '' ) {
				$styles[] = 'fill: ' . $atts['svg_fill'];
			}

			if ( $atts['svg_stroke'] !== '' ) {
				$styles[] = 'stroke: ' . $atts['svg_stroke'];
			}
			
			return $styles;
		}
		
		private function get_mark_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['mark_color'] ) ) {
				$styles[] = 'color: ' . $atts['mark_color'];
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
		
		private function get_content_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['content_bg_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['content_bg_color'];
			}
			
			return $styles;
		}
		
		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'reina_core_button',
				'exclude'        => array( 'custom_class', 'link', 'target' ),
				'atts'           => $atts,
			) );
			
			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';

			return $params;
		}
	}
}

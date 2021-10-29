<?php

if ( ! function_exists( 'reina_core_add_single_image_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function reina_core_add_single_image_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreSingleImageShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_single_image_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreSingleImageShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_single_image_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_single_image_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/single-image' );
			$this->set_base( 'reina_core_single_image' );
			$this->set_name( esc_html__( 'Single Image', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image element', 'reina-core' ) );
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
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'reina-core' ),
				'description'=> esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'reina-core' ),
			) );
			
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_action',
				'title'      => esc_html__( 'Image Action', 'reina-core' ),
				'options'    => array(
					''            => esc_html__( 'No Action', 'reina-core' ),
					'open-popup'  => esc_html__( 'Open Popup', 'reina-core' ),
					'custom-link' => esc_html__( 'Custom Link', 'reina-core' )
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Custom Link', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => array( 'custom-link' ),
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
				'dependency'    => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'textarea_html',
				'name'       => 'svg',
				'title'      => esc_html__( 'Custom SVG', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_size',
				'title'      => esc_html__( 'SVG Size', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_fill',
				'title'      => esc_html__( 'SVG Fill Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_stroke',
				'title'      => esc_html__( 'SVG Stroke Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_position_top',
				'title'      => esc_html__( 'SVG Position Top', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'svg_position_left',
				'title'      => esc_html__( 'SVG Position Left', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear_animation',
				'title'         => esc_html__( 'Enable Appear Animation', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'yes_no', false ),
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'background_image',
				'title'      => esc_html__( 'Background Image', 'reina-core' ),
			) );
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'reina_core_single_image', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['image_params']   = $this->generate_image_params( $atts );
			$atts['background_image_params']   = $this->generate_background_image_params( $atts );
			$atts['svg_styles']     = $this->get_svg_styles( $atts );
			
			return reina_core_get_template_part( 'shortcodes/single-image', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-single-image';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['image_action'] ) && $atts['image_action'] == 'open-popup' ? 'qodef-magnific-popup qodef-popup-gallery' : '';
			$holder_classes[] = ( $atts['enable_appear_animation'] == 'yes' ) ? 'qodef--draw-svg qodef--has-appear': '';
			
			return implode( ' ', $holder_classes );
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

		private function generate_background_image_params( $atts ) {
			$image = array();

			if ( ! empty( $atts['background_image'] ) ) {
				$id = $atts['background_image'];

				$image['image_id'] = intval( $id );
				$image_original    = wp_get_attachment_image_src( $id, 'full' );
				$image['url']      = $image_original[0];
				$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
				$image['image_size'] = 'full';

//				$image_size = trim( $atts['image_size'] );
//				preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
//				if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
//					$image['image_size'] = $image_size;
//				} elseif ( ! empty( $matches[0] ) ) {
//					$image['image_size'] = array(
//						$matches[0][0],
//						$matches[0][1]
//					);
//				} else {
//					$image['image_size'] = 'full';
//				}
			}

			return $image;
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

			if ( $atts['svg_position_top'] !== '' ) {
				$styles[] = 'top: ' . $atts['svg_position_top'];
			}

			if ( $atts['svg_position_left'] !== '' ) {
				$styles[] = 'left: ' . $atts['svg_position_left'];
			}

			return $styles;
		}
	}
}

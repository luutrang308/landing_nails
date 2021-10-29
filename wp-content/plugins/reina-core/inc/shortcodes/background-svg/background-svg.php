<?php

if ( ! function_exists( 'reina_core_add_background_svg_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function reina_core_add_background_svg_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreBackgroundSvgShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_background_svg_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreBackgroundSvgShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_background_svg_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_background_svg_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/background-svg' );
			$this->set_base( 'reina_core_background_svg' );
			$this->set_name( esc_html__( 'Background SVG', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds background svg element', 'reina-core' ) );
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
				'field_type' => 'textarea_html',
				'name'       => 'svg',
				'title'      => esc_html__( 'SVG code', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'width',
				'title'      => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_fill',
				'title'      => esc_html__( 'Fill Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'svg_stroke',
				'title'      => esc_html__( 'Stroke Color', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'top',
				'title'      => esc_html__( 'Position Top (px or %)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'left',
				'title'      => esc_html__( 'Position Left (px or %)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_1440',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1440', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1440', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_1440',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1440', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1440', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_1440',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1440', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1440', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_1366',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1366', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1366', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_1366',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1366', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1366', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_1366',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1366', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1366', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_1280',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1280', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1280', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_1280',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1280', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1280', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_1280',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1280', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1280', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_1024',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1024', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1024', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_1024',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1024', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1024', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_1024',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 1024', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 1024', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_768',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 768', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 768', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_768',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 768', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 768', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_768',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 768', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 768', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'width_680',
				'title'       => esc_html__( 'SVG Size (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 680', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 680', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'top_680',
				'title'       => esc_html__( 'Position Top (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 680', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 680', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'left_680',
				'title'       => esc_html__( 'Position Left (px or %)', 'reina-core' ),
				'description' => esc_html__( 'Set responsive style value for screen size 680', 'reina-core' ),
				'group'       => esc_html__( 'Screen Size 680', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'select',
				'name'        => 'hide_on_touch_devices',
				'title'       => esc_html__( 'Hide On Touch Devices', 'reina-core' ),
				'options'     => reina_core_get_select_type_options_pool('no_yes', false)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_appear_animation',
				'title'         => esc_html__( 'Enable Appear Svg Animation', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'yes_no', false ),
			) );
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'reina_core_background_svg', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['unique_class']       = 'qodef-background-svg-' . rand( 0, 1000 );
			$atts['holder_classes']     = $this->get_holder_classes( $atts );
			$atts['svg_holder_classes'] = $this->get_svg_holder_classes( $atts );
			$atts['svg_styles']         = $this->get_svg_styles( $atts );
			$this->set_responsive_styles( $atts );
			
			return reina_core_get_template_part( 'shortcodes/background-svg', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-background-svg';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['hide_on_touch_devices'] ? 'qodef-hidden--on-touch' : '';
			
			return implode( ' ', $holder_classes );
		}

		private function get_svg_holder_classes( $atts ) {
			$holder_classes = $this->init_item_classes();

			$holder_classes[] = 'qodef-m-svg';
			$holder_classes[] = $atts['unique_class'];
			$holder_classes[] = ( $atts['enable_appear_animation'] == 'yes' ) ? 'qodef--draw-svg': '';

			return implode( ' ', $holder_classes );
		}

		private function get_svg_styles( $atts ) {
			$styles = array();

			if ( $atts['width'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['width'] ) ) {
					$styles[] = 'width: ' . $atts['width'];
				} else {
					$styles[] = 'width: ' . intval( $atts['width'] ) . 'px';
				}
			}

			if ( $atts['svg_fill'] !== '' ) {
				$styles[] = 'fill: ' . $atts['svg_fill'];
			}

			if ( $atts['svg_stroke'] !== '' ) {
				$styles[] = 'stroke: ' . $atts['svg_stroke'];
			}

			if ( $atts['top'] !== '' ) {
				$styles[] = 'top: ' . $atts['top'];
			}

			if ( $atts['left'] !== '' ) {
				$styles[] = 'left: ' . $atts['left'];
			}

			return $styles;
		}

		private function set_responsive_styles( $atts ) {
			$unique_class = '.' . $atts['unique_class'];
			$screen_sizes = array( '1440', '1366', '1280', '1024', '768', '680' );
			$option_keys  = array( 'width', 'top', 'left' );

			foreach ( $screen_sizes as $screen_size ) {
				$styles = array();

				foreach ( $option_keys as $option_key ) {
					$option_value = $atts[ $option_key . '_' . $screen_size ];
					$style_key    = str_replace( '_', '-', $option_key );

					if ( $option_value !== '' ) {
						if ( qode_framework_string_ends_with_space_units( $option_value, true ) ) {
							$styles[ $style_key ] = $option_value . '!important';
						} else {
							$styles[ $style_key ] = intval( $option_value ) . 'px !important';
						}
					}
				}

				if ( ! empty( $styles ) ) {
					add_filter( 'reina_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer', function ( $style ) use ( $unique_class, $styles ) {
						$style .= qode_framework_dynamic_style( $unique_class, $styles );

						return $style;
					} );
				}
			}
		}
	}
}

<?php

if ( ! function_exists( 'reina_core_add_pricing_list_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_pricing_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCorePricingListShortcode';

		return $shortcodes;
	}

	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_pricing_list_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCorePricingListShortcode extends ReinaCoreShortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/pricing-list' );
			$this->set_base( 'reina_core_pricing_list' );
			$this->set_name( esc_html__( 'Pricing List', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds pricing list element', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'skin',
				'title'      => esc_html__( 'Light Skin', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'no_yes', false ),
			) );
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Child elements', 'reina-core' ),
				'items'      => array(
					array(
						'field_type'    => 'select',
						'name'          => 'icon_type',
						'title'         => esc_html__( 'Icon Type', 'reina-core' ),
						'options'       => array(
							'image' => esc_html__( 'Image', 'reina-core' ),
							'svg'   => esc_html__( 'SVG', 'reina-core' ),
						),
						'default_value' => 'svg',
					),
					array(
						'field_type' => 'image',
						'name'       => 'image_id',
						'title'      => esc_html__( 'Icon Image', 'reina-core' ),
						'dependency' => array(
							'show' => array(
								'icon_type' => array(
									'values'        => 'image',
									'default_value' => ''
								)
							)
						)
					),
					array(
						'field_type' => 'textarea',
						'name'       => 'svg_icon',
						'title'      => esc_html__( 'Icon SVG', 'reina-core' ),
						'dependency' => array(
							'show' => array(
								'icon_type' => array(
									'values'        => 'svg',
									'default_value' => ''
								)
							)
						)
					),
					array(
						'field_type' => 'color',
						'name'       => 'svg_icon_fill',
						'title'      => esc_html__( 'SVG Fill Color', 'reina-core' ),
						'dependency' => array(
							'show' => array(
								'icon_type' => array(
									'values'        => 'svg',
									'default_value' => ''
								)
							)
						)
					),
					array(
						'field_type' => 'color',
						'name'       => 'svg_icon_stroke',
						'title'      => esc_html__( 'SVG Stroke Color', 'reina-core' ),
						'dependency' => array(
							'show' => array(
								'icon_type' => array(
									'values'        => 'svg',
									'default_value' => ''
								)
							)
						)
					),
					array(
						'field_type' => 'text',
						'name'       => 'title',
						'title'      => esc_html__( 'Title', 'reina-core' )
					),
					array(
						'field_type' => 'textarea',
						'name'       => 'text',
						'title'      => esc_html__( 'Text', 'reina-core' ),
					),
					array(
						'field_type' => 'text',
						'name'       => 'price',
						'title'      => esc_html__( 'Price', 'reina-core' ),
					),
					array(
						'field_type'    => 'text',
						'name'          => 'price_label',
						'title'         => esc_html__( 'Price Label', 'reina-core' ),
						'default_value' => esc_html__( 'from', 'reina-core' ),
					),
				)
			) );
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;

			return reina_core_get_template_part( 'shortcodes/pricing-list', 'templates/holder', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-pricing-list';
			$holder_classes[] = 'yes' === $atts['skin'] ? 'qodef--light' : '';

			return implode( ' ', $holder_classes );
		}

		public function get_svg_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['svg_icon_fill'] ) ) {
				$styles[] = 'fill: ' . $atts['svg_icon_fill'];
			}

			if ( ! empty( $atts['svg_icon_stroke'] ) ) {
				$styles[] = 'stroke: ' . $atts['svg_icon_stroke'];
			}

			return $styles;
		}
	}
}

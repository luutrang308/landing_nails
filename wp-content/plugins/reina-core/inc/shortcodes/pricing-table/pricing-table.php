<?php

if ( ! function_exists( 'reina_core_add_pricing_table_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_pricing_table_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCorePricingTableShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_pricing_table_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCorePricingTableShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_pricing_table_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_pricing_table_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/pricing-table' );
			$this->set_base( 'reina_core_pricing_table' );
			$this->set_name( esc_html__( 'Pricing Table', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds pricing table element', 'reina-core' ) );
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
				'field_type'    => 'select',
				'name'          => 'featured_table',
				'title'         => esc_html__( 'Featured Table', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no'
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'featured_table_title',
				'title'      => esc_html__( 'Featured Table Title', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'featured_table' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'featured_table_title_color',
				'title'      => esc_html__( 'Featured Table Title Color', 'reina-core' ),
				'dependency' => array(
					'show' => array(
						'featured_table' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'table_background_color',
				'title'      => esc_html__( 'Background Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'table_border_color',
				'title'      => esc_html__( 'Border Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'price',
				'title'      => esc_html__( 'Price', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'price_color',
				'title'      => esc_html__( 'Price Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'currency',
				'title'      => esc_html__( 'Currency', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'price_period',
				'title'      => esc_html__( 'Price Period', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'price_period_color',
				'title'      => esc_html__( 'Currency Color', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'html',
				'name'       => 'content',
				'title'      => esc_html__( 'Content', 'reina-core' )
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
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']        = $this->get_holder_classes( $atts );
			$atts['holder_styles']         = $this->get_holder_styles( $atts );
			$atts['featured_title_styles'] = $this->get_featured_title_styles( $atts );
			$atts['title_styles']          = $this->get_title_styles( $atts );
			$atts['price_styles']          = $this->get_price_styles( $atts );
			$atts['price_period_styles']   = $this->get_price_period_styles( $atts );
			$atts['button_params']         = $this->generate_button_params( $atts );
			$atts['content']               = $this->get_editor_content( $content, $options );
			
			return reina_core_get_template_part( 'shortcodes/pricing-table', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-pricing-table';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty ( $atts['featured_table'] ) && $atts['featured_table'] == 'yes' ? 'qodef-status--featured' : 'qodef-status--regular';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['table_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['table_background_color'];
			}
			
			if ( ! empty( $atts['table_border_color'] ) ) {
				$styles[] = 'border-color: ' . $atts['table_border_color'];
			}
			
			return $styles;
		}
		
		private function get_featured_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['featured_table_title_color'] ) ) {
				$styles[] = 'color: ' . $atts['featured_table_title_color'];
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
		
		private function get_price_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['price_color'] ) ) {
				$styles[] = 'color: ' . $atts['price_color'];
			}
			
			return $styles;
		}
		
		private function get_price_period_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['price_period_color'] ) ) {
				$styles[] = 'color: ' . $atts['price_period_color'];
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
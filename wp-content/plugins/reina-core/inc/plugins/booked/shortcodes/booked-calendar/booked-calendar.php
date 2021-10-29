<?php

if ( ! function_exists( 'reina_core_add_booked_calendar_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_booked_calendar_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreBookedCalendarShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_booked_calendar_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreBookedCalendarShortcode extends ReinaCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_PLUGINS_URL_PATH . '/booked/shortcodes/booked-calendar' );
			$this->set_base( 'reina_core_booked_calendar' );
			$this->set_name( esc_html__( 'Booked Calendar', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays booked calendar', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'calendar',
				'title'      => esc_html__( 'Calendar', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'booked_calendars' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'calendar_size',
				'title'      => esc_html__( 'Calendar Size', 'reina-core' ),
				'options'    => array(
					'large' => esc_html__( 'Large', 'reina-core' ),
					'small' => esc_html__( 'Small', 'reina-core' ),
				),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h2',
				'group'         => esc_html__( 'Title Styles', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'reina-core' ),
				'group'      => esc_html__( 'Title Styles', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'title_font_weight',
				'title'      => esc_html__( 'Title Font Weight', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'font_weight' ),
				'group'      => esc_html__( 'Title Styles', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_bottom',
				'title'      => esc_html__( 'Title Bottom Margin (px)', 'reina-core' ),
				'group'      => esc_html__( 'Title Styles', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'shadow',
				'title'      => esc_html__( 'Enable Shadow?', 'reina-core' ),
				'options'    => reina_core_get_select_type_options_pool( 'no_yes', false ),
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			
			$atts['this_shortcode'] = $this;
			
			return reina_core_get_template_part( 'plugins/booked/shortcodes/booked-calendar', 'templates/booked-calendar-template', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-booked-calendar';
			$holder_classes[] = 'yes' == $atts['shadow'] ? 'qodef--has-shadow' : '';
			$holder_classes   = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			if ( ! empty( $atts['title_font_weight'] ) ) {
				$styles[] = 'font-weight: ' . $atts['title_font_weight'];
			}
			
			if ( $atts['title_margin_bottom'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['title_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['title_margin_bottom'] ) . 'px';
				}
			}
			
			return $styles;
		}
		
		public function get_calendar_attrs( $atts ) {
			$attrs = array();
			
			if ( ! empty( $atts['calendar'] ) ) {
				$attrs['calendar'] = esc_attr( $atts['calendar'] );
			}
			
			if ( ! empty( $atts['calendar_size'] ) ) {
				$attrs['size'] = esc_attr( $atts['calendar_size'] );
			}
			
			return $attrs;
		}
	}
}

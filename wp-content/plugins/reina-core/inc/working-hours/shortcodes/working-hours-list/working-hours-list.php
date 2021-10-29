<?php

if ( ! function_exists( 'reina_core_add_working_hours_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_working_hours_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreWorkingHoursListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_working_hours_list_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreWorkingHoursListShortcode extends ReinaCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_INC_URL_PATH . '/working-hours/shortcodes/working-hours-list' );
			$this->set_base( 'reina_core_working_hours_list' );
			$this->set_name( esc_html__( 'Working Hours List', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays working hours list', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' )
			) );

			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'day_color',
				'title'      => esc_html__( 'Day Color', 'reina-core' )
			) );

			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'time_color',
				'title'      => esc_html__( 'Time Color', 'reina-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();

			$atts['holder_classes']       = $this->get_holder_classes();
			$atts['working_hours_params'] = $this->get_working_hours_params();
			$atts['day_styles']           = $this->get_day_styles( $atts );
			$atts['time_styles']          = $this->get_time_styles( $atts );
			
			return reina_core_get_template_part( 'working-hours/shortcodes/working-hours-list', 'templates/working-hours-list', '', $atts );
		}
		
		private function get_holder_classes() {
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-working-hours-list';
			$holder_classes   = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_working_hours_params() {
			$params = array();
			
			return apply_filters( 'reina_core_filter_working_hours_template_params', $params );
		}

		private function get_day_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['day_color'] ) ) {
				$styles[] = 'color: ' . $atts['day_color'];
			}

			return $styles;
		}

		private function get_time_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['time_color'] ) ) {
				$styles[] = 'color: ' . $atts['time_color'];
			}

			return $styles;
		}
	}
}
<?php

if ( ! function_exists( 'reina_core_add_working_hours_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_working_hours_list_widget( $widgets ) {
		$widgets[] = 'ReinaCoreWorkingHoursListWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_working_hours_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreWorkingHoursListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'reina-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_working_hours_list'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'reina_core_working_hours_list' );
				$this->set_name( esc_html__( 'Reina Working Hours List', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a working hours list element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_working_hours_list $params]" ); // XSS OK
		}
	}
}
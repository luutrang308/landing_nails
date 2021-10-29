<?php

if ( ! function_exists( 'reina_core_add_button_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_button_widget( $widgets ) {
		$widgets[] = 'ReinaCoreButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_button_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreButtonWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_button'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'reina_core_button' );
				$this->set_name( esc_html__( 'Reina Button', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a button element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_button $params]" ); // XSS OK
		}
	}
}
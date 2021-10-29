<?php

if ( ! function_exists( 'reina_core_add_custom_font_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_custom_font_widget( $widgets ) {
		$widgets[] = 'ReinaCoreCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_custom_font_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreCustomFontWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_custom_font'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'reina_core_custom_font' );
				$this->set_name( esc_html__( 'Reina Custom Font', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a custom font element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_custom_font $params]" ); // XSS OK
		}
	}
}
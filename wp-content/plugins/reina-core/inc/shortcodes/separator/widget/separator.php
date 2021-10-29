<?php

if ( ! function_exists( 'reina_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_separator_widget( $widgets ) {
		$widgets[] = 'ReinaCoreSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreSeparatorWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_separator'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'reina_core_separator' );
				$this->set_name( esc_html__( 'Reina Separator', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_separator $params]" ); // XSS OK
		}
	}
}
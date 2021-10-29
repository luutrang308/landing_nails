<?php

if ( ! function_exists( 'reina_core_add_social_share_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_social_share_widget( $widgets ) {
		$widgets[] = 'ReinaCoreSocialShareWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_social_share_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreSocialShareWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_social_share'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'reina_core_social_share' );
				$this->set_name( esc_html__( 'Reina Social Share', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a social share element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_social_share $params]" ); // XSS OK
		}
	}
}
<?php

if ( ! function_exists( 'reina_core_add_icon_list_item_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_icon_list_item_widget( $widgets ) {
		$widgets[] = 'ReinaCoreIconListItemWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_icon_list_item_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreIconListItemWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'reina_core_icon_list_item',
				'exclude'   => array(
					'icon_type', 'custom_icon'
				)
			) );
			if( $widget_mapped ) {
				$this->set_base( 'reina_core_icon_list_item' );
				$this->set_name( esc_html__( 'Reina Icon List Item', 'reina-core' ) );
				$this->set_description( esc_html__( 'Add a icon list item element into widget areas', 'reina-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[reina_core_icon_list_item $params]" ); // XSS OK
		}
	}
}

<?php

if ( ! function_exists( 'reina_core_add_sticky_sidebar_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function reina_core_add_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'ReinaCoreStickySidebarWidget';
		
		return $widgets;
	}
	
	add_filter( 'reina_core_filter_register_widgets', 'reina_core_add_sticky_sidebar_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class ReinaCoreStickySidebarWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'reina_core_sticky_sidebar' );
			$this->set_name( esc_html__( 'Reina Sticky Sidebar', 'reina-core' ) );
			$this->set_description( esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar', 'reina-core' ) );
		}
		
		public function render( $atts ) {
		}
	}
}

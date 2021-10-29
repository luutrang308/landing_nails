<?php

if ( ! function_exists( 'reina_core_get_elementor_instance' ) ) {
	/**
	 * Function that return page builder module instance
	 */
	function reina_core_get_elementor_instance() {
		return \Elementor\Plugin::instance();
	}
}

if ( ! function_exists( 'reina_core_get_elementor_widgets_manager' ) ) {
	/**
	 * Function that return page builder widget module instance
	 */
	function reina_core_get_elementor_widgets_manager() {
		return reina_core_get_elementor_instance()->widgets_manager;
	}
}

if ( ! function_exists( 'reina_core_load_elementor_widgets' ) ) {
	/**
	 * Function that include modules into page builder
	 */
	function reina_core_load_elementor_widgets() {
		$check_code = class_exists( 'ReinaCoreDashboard' ) ? ReinaCoreDashboard::get_instance()->get_code() : true;
		
		if ( ! empty( $check_code ) ) {
			include_once REINA_CORE_PLUGINS_PATH . '/elementor/elementor-widget-base.php';
			
			$widgets = array();
			foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/*', GLOB_ONLYDIR ) as $shortcode ) {
				
				if ( basename( $shortcode ) !== 'dashboard' ) {
					$is_disabled = reina_core_performance_get_option_value( $shortcode, 'reina_core_performance_shortcode_' );
					
					if ( empty( $is_disabled ) ) {
						foreach ( glob( $shortcode . '/*-elementor.php' ) as $shortcode_load ) {
							$widgets[ basename( $shortcode_load ) ] = $shortcode_load;
						}
					}
				}
			}
			
			foreach ( glob( REINA_CORE_INC_PATH . '/*/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
				$widgets[ basename( $shortcode_load ) ] = $shortcode_load;
			}
			
			foreach ( glob( REINA_CORE_CPT_PATH . '/*', GLOB_ONLYDIR ) as $post_type ) {
				
				if ( basename( $post_type ) !== 'dashboard' ) {
					$is_disabled = reina_core_performance_get_option_value( $post_type, 'reina_core_performance_post_type_' );
					
					if ( empty( $is_disabled ) ) {
						foreach ( glob( $post_type . '/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
							$widgets[ basename( $shortcode_load ) ] = $shortcode_load;
						}
					}
				}
			}
			
			foreach ( glob( REINA_CORE_PLUGINS_PATH . '/*/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
				$widgets[ basename( $shortcode_load ) ] = $shortcode_load;
			}
			
			foreach ( glob( REINA_CORE_PLUGINS_PATH . '/*/post-types/*/shortcodes/*/*-elementor.php' ) as $shortcode_load ) {
				$widgets[ basename( $shortcode_load ) ] = $shortcode_load;
			}
			
			if ( ! empty( $widgets ) ) {
				ksort( $widgets );
				
				foreach ( $widgets as $widget ) {
					include_once $widget;
				}
			}
		}
	}
	
	add_action( 'elementor/widgets/widgets_registered', 'reina_core_load_elementor_widgets' );
}

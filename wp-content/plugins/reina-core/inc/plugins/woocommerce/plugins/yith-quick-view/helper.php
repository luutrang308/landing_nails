<?php

if ( ! function_exists( 'reina_core_include_yith_quick_view_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function reina_core_include_yith_quick_view_plugin_is_installed( $installed, $plugin ) {
		if ( $plugin === 'yith-quick-view' ) {
			return defined( 'YITH_WCQV' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'reina_core_include_yith_quick_view_plugin_is_installed', 10, 2 );
}
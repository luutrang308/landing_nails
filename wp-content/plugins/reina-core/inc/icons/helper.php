<?php

if ( ! function_exists( 'reina_core_include_icons' ) ) {
	/**
	 * Function that includes icons
	 */
	function reina_core_include_icons() {
		
		foreach ( glob( REINA_CORE_INC_PATH . '/icons/*/include.php' ) as $icon_pack ) {
			$is_disabled = reina_core_performance_get_option_value( dirname( $icon_pack ), 'reina_core_performance_icon_pack_' );
			
			if ( empty( $is_disabled ) ) {
				include_once $icon_pack;
			}
		}
	}
	
	add_action( 'qode_framework_action_before_icons_register', 'reina_core_include_icons' );
}
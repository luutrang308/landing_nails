<?php

if ( ! function_exists( 'reina_core_include_image_sizes' ) ) {
	/**
	 * Function that includes icons
	 */
	function reina_core_include_image_sizes() {
		foreach ( glob( REINA_CORE_INC_PATH . '/media/*/include.php' ) as $image_size ) {
			include_once $image_size;
		}
	}
	
	add_action( 'qode_framework_action_before_images_register', 'reina_core_include_image_sizes' );
}
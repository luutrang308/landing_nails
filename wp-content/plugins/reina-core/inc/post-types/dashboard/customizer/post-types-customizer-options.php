<?php

if ( ! function_exists( 'reina_core_add_post_types_customizer_options' ) ) {
	/**
	 * Function that add customizer options for this module
	 */
	function reina_core_add_post_types_customizer_options( $page ) {
	
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type'  => 'section',
					'name'        => 'reina_core_performance_post_types_section',
					'title'       => esc_html__( 'Custom Post Types', 'reina-core' ),
					'description' => esc_html__( 'Here you can select specific features to disable. Note that disabling certain features and functionality which you will not be needing or which you are otherwise not utilizing in any way can have a positive effect to the overall performance of your site.', 'reina-core' )
				)
			);
			
			foreach ( glob( REINA_CORE_CPT_PATH . '/*', GLOB_ONLYDIR ) as $post_type ) {
				$post_type_name = basename( $post_type );
				
				if ( $post_type_name !== 'dashboard' ) {
					$post_type_label = ucwords( str_replace( '-', ' ', $post_type_name ) );
					$post_type_name  = str_replace( '-', '_', $post_type_name );
					
					$page->add_field_element(
						array(
							'field_type'        => 'setting',
							'option_type'       => 'option',
							'name'              => "reina_core_performance_post_type_{$post_type_name}",
							'default_value'     => false,
							'sanitize_callback' => 'sanitize_checkbox'
						)
					);
					
					$page->add_field_element(
						array(
							'field_type'  => 'control',
							'option_type' => 'checkbox',
							'section'     => 'reina_core_performance_post_types_section',
							'settings'    => "reina_core_performance_post_type_{$post_type_name}",
							'name'        => "reina_core_performance_post_type_{$post_type_name}_control",
							'title'       => $post_type_label
						)
					);
				}
			}
			
			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_post_types_customizer_options', $page );
		}
	}
	
	add_action( 'reina_core_action_performance_customizer_options', 'reina_core_add_post_types_customizer_options' );
}
<?php

if ( qode_framework_is_installed( 'timetable' ) ) {

	if ( ! function_exists( 'reina_core_add_timetable_events_single_meta_box' ) ) {
		/**
		 * Function that add general options for this module
		 */
		function reina_core_add_timetable_events_single_meta_box() {
			$qode_framework = qode_framework_get_framework_root();
			
				$timetable_events_settings = timetable_events_settings();
	
			$page = $qode_framework->add_options_page(
				array(
					'scope' => array( $timetable_events_settings['slug'] ),
					'type'  => 'meta',
					'slug'  => $timetable_events_settings['slug'],
					'title' => esc_html__( 'Timetable Events List', 'reina-core' ),
					'layout' => 'tabbed'
				)
			);
	
			if ( $page ) {
				$general_section = $page->add_tab_element(
					array(
						'name'        => 'qodef_event_single_general_section',
						'icon'        => 'fa fa-cog',
						'title'       => esc_html__( 'General Settings', 'reina-core' ),
						'description' => esc_html__( 'General information about event single', 'reina-core' )
					)
				);
				
				$general_section->add_field_element(
					array(
						'field_type'  => 'image',
						'name'        => 'qodef_timetable_events_list_image',
						'title'       => esc_html__( 'Timetable Events List Image', 'reina-core' ),
						'description' => esc_html__( 'Upload image to be displayed on timetable events list instead of featured image', 'reina-core' )
					)
				);
				
				$general_section->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_masonry_image_dimension_timetable_events',
						'title'       => esc_html__( 'Image Dimension', 'reina-core' ),
						'description' => esc_html__( 'Choose an image layout for timetable events list. If you are using fixed image proportions on the list, choose an option other than default', 'reina-core' ),
						'options'     => reina_core_get_select_type_options_pool( 'masonry_image_dimension' )
					)
				);
	
				// Hook to include additional options after module options
				do_action( 'reina_core_action_after_donation_single_meta_box_map', $page );
			}
		}
	
		add_action( 'reina_core_action_default_meta_boxes_init', 'reina_core_add_timetable_events_single_meta_box' );
	}
}
if ( ! function_exists( 'reina_core_include_general_meta_boxes_for_timetable_single' ) ) {
	/**
	 * Function that add general meta box options for this module
	 */
	function reina_core_include_general_meta_boxes_for_timetable_single() {
		$callbacks = reina_core_general_meta_box_callbacks();
		
		if ( ! empty( $callbacks ) ) {
			foreach ( $callbacks as $module => $callback ) {
				add_action('reina_core_action_after_donation_single_meta_box_map', $callback);
			}
		}
	}
	
	add_action( 'reina_core_action_default_meta_boxes_init', 'reina_core_include_general_meta_boxes_for_timetable_single', 8 ); // Permission 8 is set in order to load it before default meta box function
}

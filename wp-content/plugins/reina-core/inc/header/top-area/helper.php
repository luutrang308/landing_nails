<?php

if ( ! function_exists( 'reina_core_dependency_for_top_area_options' ) ) {
	/**
	 * Function which return dependency values for global module options
	 *
	 * @return array
	 */
	function reina_core_dependency_for_top_area_options() {
		return apply_filters( 'reina_core_filter_top_area_hide_option', $hide_dep_options = array() );
	}
}

if ( ! function_exists( 'reina_core_register_top_area_header_areas' ) ) {
	/**
	 * Function which register widget areas for current module
	 */
	function reina_core_register_top_area_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-top-area-left',
				'name'          => esc_html__( 'Header Top Area - Left', 'reina-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top header area', 'reina-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="qodef-widget-title">',
				'after_title'   => '</span>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'qodef-top-area-right',
				'name'          => esc_html__( 'Header Top Area - Right', 'reina-core' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top header area', 'reina-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-top-bar-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="qodef-widget-title">',
				'after_title'   => '</span>',
			)
		);
	}

	add_action( 'reina_core_action_additional_header_widgets_area', 'reina_core_register_top_area_header_areas' );
}

if ( ! function_exists( 'reina_core_set_top_area_header_widget_area' ) ) {
	/**
	 * This function add additional header widgets area into global list
	 *
	 * @param array $widget_area_map
	 *
	 * @return array
	 */
	function reina_core_set_top_area_header_widget_area( $widget_area_map ) {
		
		if ( $widget_area_map['header_layout'] === 'top-area-left' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-left';
			$widget_area_map['custom_widget_area']  = '';
		} elseif ( $widget_area_map['header_layout'] === 'top-area-right' ) {
			$widget_area_map['is_enabled']          = true;
			$widget_area_map['default_widget_area'] = 'qodef-top-area-right';
			$widget_area_map['custom_widget_area']  = '';
		}
		
		return $widget_area_map;
	}
	
	add_filter( 'reina_core_filter_header_widget_area', 'reina_core_set_top_area_header_widget_area' );
}
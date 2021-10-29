<?php

if ( ! function_exists( 'reina_core_include_working_hours_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function reina_core_include_working_hours_shortcodes() {
		foreach ( glob( REINA_CORE_INC_PATH . '/working-hours/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'reina_core_include_working_hours_shortcodes' );
}

if ( ! function_exists( 'reina_core_include_working_hours_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function reina_core_include_working_hours_widgets() {
		foreach ( glob( REINA_CORE_INC_PATH . '/working-hours/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}
	
	add_action( 'qode_framework_action_before_widgets_register', 'reina_core_include_working_hours_widgets' );
}

if ( ! function_exists( 'reina_core_set_working_hours_template_params' ) ) {
	/**
	 * Function that set working hours area content parameters
	 *
	 * @param array $params
	 *
	 * @return array
	 */
	function reina_core_set_working_hours_template_params( $params ) {
		$days = array(
			'monday'    => esc_html__( 'Monday', 'reina-core' ),
			'tuesday'   => esc_html__( 'Tuesday', 'reina-core' ),
			'wednesday' => esc_html__( 'Wednesday', 'reina-core' ),
			'thursday'  => esc_html__( 'Thursday', 'reina-core' ),
			'friday'    => esc_html__( 'Friday', 'reina-core' ),
			'saturday'  => esc_html__( 'Saturday', 'reina-core' ),
			'sunday'    => esc_html__( 'Sunday', 'reina-core' ),
		);
		
		$check_work_day_time = array();
		$weekend_work_day_time = array();
		
		foreach ( $days as $day => $label ) {
			$option = reina_core_get_post_value_through_levels( 'qodef_working_hours_' . $day );
			
			if ( ! in_array( $day, array( 'saturday', 'sunday' ) ) ) {
				$check_work_day_time[ $label ] = ! empty( $option ) ? esc_attr( $option ) : '';
			} else {
				$weekend_work_day_time[ $label ] = ! empty( $option ) ? esc_attr( $option ) : '';
			}
			
			$params[ $label ] = ! empty( $option ) ? esc_attr( $option ) : '';
		}
		
		if ( ! empty( $check_work_day_time ) && count( array_unique( $check_work_day_time ) ) === 1 ) {
			return array_merge( array( esc_html__( 'Monday_to_Friday', 'reina-core' ) => $check_work_day_time[ esc_html__( 'Monday', 'reina-core' ) ] ), $weekend_work_day_time );
		} else {
			return $params;
		}
	}
	
	add_filter( 'reina_core_filter_working_hours_template_params', 'reina_core_set_working_hours_template_params' );
}

if ( ! function_exists( 'reina_core_working_hours_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param int $position
	 * @param string $map
	 *
	 * @return int
	 */
	function reina_core_working_hours_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'working-hours' ) {
			$position = 90;
		}
		
		return $position;
	}
	
	add_filter( 'reina_core_filter_admin_options_map_position', 'reina_core_working_hours_set_admin_options_map_position', 10, 2 );
}
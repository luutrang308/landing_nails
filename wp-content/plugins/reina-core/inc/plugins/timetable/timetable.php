<?php

if ( ! function_exists( 'reina_core_register_timetable_events_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function reina_core_register_timetable_events_for_meta_options( $post_types ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$timetable_events_settings = timetable_events_settings();
			$post_types[] = $timetable_events_settings['slug'];

		}

		return $post_types;
	}

	add_filter( 'qode_framework_filter_meta_box_save', 'reina_core_register_timetable_events_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'reina_core_register_timetable_events_for_meta_options' );
}

if ( ! class_exists( 'ReinaCoreTimetable' ) ) {
	class ReinaCoreTimetable {
		private static $instance;
		
		public function __construct() {
			// Include helper functions
			include_once REINA_CORE_PLUGINS_PATH . '/timetable/helper.php';
			
			if ( qode_framework_is_installed( 'timetable' ) ) {
				// Init
				$this->init();
				
				// Add module body classes
				add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			}
		}
		
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function init() {
			// Set dashboard admin options map position
			add_filter( 'reina_core_filter_admin_options_map_position', array( $this, 'set_map_position' ), 10, 2 );
			
			// Include options
			include_once REINA_CORE_PLUGINS_PATH . '/timetable/dashboard/admin/timetable-options.php';

			// Include meta boxes
			include_once REINA_CORE_PLUGINS_PATH . '/timetable/dashboard/meta-box/timetable-meta-box.php';
		}
		
		function set_map_position( $position, $map ) {
			
			if ( $map === 'timetable' ) {
				$position = 56;
			}
			
			return $position;
		}

		function add_body_classes( $classes ) {
			$predefined_style = reina_core_get_option_value( 'admin', 'qodef_enable_timetable_predefined_style' );
			
			if ( $predefined_style === 'yes' ) {
				$classes[] = 'qodef-timetable--predefined';
			}
			
			return $classes;
		}
	}
	
	ReinaCoreTimetable::get_instance();
}

if ( ! function_exists( 'reina_core_set_timetable_single_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function reina_core_set_timetable_single_sidebar_layout( $layout ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if (is_singular( $slug ) ) {
				$option = reina_core_get_post_value_through_levels('qodef_timetable_single_sidebar_layout');

				if (!empty($option)) {
					$layout = $option;
				}

				$meta_option = get_post_meta(get_the_ID(), 'qodef_page_sidebar_layout', true);

				if (!empty($meta_option)) {
					$layout = $meta_option;
				}
			}
		}

		return $layout;
	}

	add_filter( 'reina_filter_sidebar_layout', 'reina_core_set_timetable_single_sidebar_layout' );
}

if ( ! function_exists( 'reina_core_set_timetable_single_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function reina_core_set_timetable_single_custom_sidebar_name( $sidebar_name ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if (is_singular( $slug ) ) {
				$sidebar_name = 'sidebar-event';

				$option = reina_core_get_post_value_through_levels( 'qodef_timetable_single_custom_sidebar' );

				if ( ! empty( $option ) ) {
					$sidebar_name = $option;
				}

				$meta_option = get_post_meta( get_the_ID(), 'qodef_page_custom_sidebar', true );

				if ( ! empty( $meta_option ) ) {
					$sidebar_name = $meta_option;
				}

				return $sidebar_name;
			}
		}


		return $sidebar_name;
	}

	add_filter( 'reina_filter_sidebar_name', 'reina_core_set_timetable_single_custom_sidebar_name' );
}

if ( ! function_exists( 'reina_core_set_timetable_single_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function reina_core_set_timetable_single_sidebar_grid_gutter_classes( $classes ) {

		if ( qode_framework_is_installed( 'timetable' ) ) {
			$slug = timetable_events_settings()['slug'];

			if (is_singular( $slug ) ) {
				$option = reina_core_get_post_value_through_levels('qodef_timetable_single_sidebar_grid_gutter');

				if (!empty($option)) {
					$classes = 'qodef-gutter--' . esc_attr($option);
				}

				$meta_option = get_post_meta(get_the_ID(), 'qodef_page_sidebar_grid_gutter', true);

				if (!empty($meta_option)) {
					$classes = 'qodef-gutter--' . esc_attr($meta_option);
				}
			}
		}

		return $classes;
	}

	add_filter( 'reina_filter_grid_gutter_classes', 'reina_core_set_timetable_single_sidebar_grid_gutter_classes' );
}

<?php
if ( ! function_exists( 'reina_core_register_minimal_search_layout' ) ) {
	/**
	 * Function that add variation layout into global list
	 *
	 * @param array $search_layouts
	 *
	 * @return array
	 */
	function reina_core_register_minimal_search_layout( $search_layouts ) {
		$search_layout = array(
			'minimal' => 'MinimalSearch'
		);

		$search_layouts = array_merge( $search_layouts, $search_layout );

		return $search_layouts;
	}

	add_filter( 'reina_core_filter_register_search_layouts', 'reina_core_register_minimal_search_layout');
}

<?php

if ( ! function_exists( 'reina_core_add_portfolio_single_navigation_meta_box' ) ) {
	/**
	 * Function that add general meta box options for this module
	 */
	function reina_core_add_portfolio_single_navigation_meta_box( $page, $general_tab ) {
		
		if ( $page ) {
			
			$general_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_portfolio_single_back_to_link',
					'title'       => esc_html__( 'Back To Link', 'reina-core' ),
					'description' => esc_html__( 'Choose "Back To" page to link from album single', 'reina-core' ),
					'options'     => qode_framework_get_pages( true ),
				)
			);
		}
	}
	
	add_action( 'reina_core_action_after_portfolio_meta_box_map', 'reina_core_add_portfolio_single_navigation_meta_box', 10, 2 );
}
<?php

if ( ! function_exists( 'reina_core_include_portfolio_single_post_navigation_template' ) ) {
	/**
	 * Function which includes additional module on single portfolio page
	 */
	function reina_core_include_portfolio_single_post_navigation_template() {
		reina_core_template_part( 'post-types/portfolio', 'templates/single/single-navigation/templates/single-navigation' );
	}
	
	add_action( 'reina_core_action_after_portfolio_single_item', 'reina_core_include_portfolio_single_post_navigation_template' );
}
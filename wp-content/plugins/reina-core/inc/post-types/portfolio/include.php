<?php

include_once REINA_CORE_CPT_PATH . '/portfolio/helper.php';

foreach ( glob( REINA_CORE_CPT_PATH . '/portfolio/dashboard/admin/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( REINA_CORE_CPT_PATH . '/portfolio/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}

foreach ( glob( REINA_CORE_CPT_PATH . '/portfolio/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}

foreach ( glob( REINA_CORE_CPT_PATH . '/portfolio/templates/single/*/include.php' ) as $single_part ) {
	include_once $single_part;
}

if ( ! function_exists( 'reina_core_include_portfolio_tax_fields' ) ) {
	/**
	 * Function that include module taxonomy options
	 */
	function reina_core_include_portfolio_tax_fields() {
		include_once REINA_CORE_CPT_PATH . '/portfolio/dashboard/taxonomy/taxonomy-options.php';
	}
	
	add_action( 'reina_core_action_include_cpt_tax_fields', 'reina_core_include_portfolio_tax_fields' );
}
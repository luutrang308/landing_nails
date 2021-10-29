<?php

if ( ! function_exists( 'reina_core_add_product_categories_list_variation_info_on_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_product_categories_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'reina-core' );

		return $variations;
	}

	add_filter( 'reina_core_filter_product_categories_list_layouts', 'reina_core_add_product_categories_list_variation_info_on_image' );
}
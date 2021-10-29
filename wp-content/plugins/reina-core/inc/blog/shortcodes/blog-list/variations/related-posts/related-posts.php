<?php

if ( ! function_exists( 'reina_core_add_blog_list_variation_related_posts' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function reina_core_add_blog_list_variation_related_posts( $variations ) {
		$variations['related-posts'] = esc_html__( 'Related Posts', 'reina-core' );
		
		return $variations;
	}
	
	add_filter( 'reina_core_filter_blog_list_layouts', 'reina_core_add_blog_list_variation_related_posts' );
}

if ( ! function_exists( 'reina_core_load_blog_list_variation_related_posts_assets' ) ) {
	/**
	 * Function that return is global blog asses allowed for variation layout
	 *
	 * @param bool $is_enabled
	 * @param array $params
	 *
	 * @return bool
	 */
	function reina_core_load_blog_list_variation_related_posts_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'related-posts' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'reina_core_filter_load_blog_list_assets', 'reina_core_load_blog_list_variation_related_posts_assets', 10, 2 );
}

if ( ! function_exists( 'reina_core_register_blog_list_related_posts_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function reina_core_register_blog_list_related_posts_scripts( $scripts ) {

		$scripts['wp-mediaelement'] = array(
			'registered'	=> true
		);
		$scripts['mediaelement-vimeo'] = array(
			'registered'	=> true
		);

		return $scripts;
	}

	add_filter( 'reina_core_filter_blog_list_register_scripts', 'reina_core_register_blog_list_related_posts_scripts' );
}

if ( ! function_exists( 'reina_core_register_blog_list_related_posts_styles' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function reina_core_register_blog_list_related_posts_styles( $styles ) {

		$styles['wp-mediaelement'] = array(
			'registered'	=> true
		);

		return $styles;
	}

	add_filter( 'reina_core_filter_blog_list_register_styles', 'reina_core_register_blog_list_related_posts_styles' );
}
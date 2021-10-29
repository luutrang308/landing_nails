<?php

if ( ! function_exists( 'reina_core_register_masonry_gallery_for_meta_options' ) ) {
	/**
	 * Function that add custom post type into global meta box allowed items array for saving meta box options
	 *
	 * @param array $post_types
	 *
	 * @return array
	 */
	function reina_core_register_masonry_gallery_for_meta_options( $post_types ) {
		$post_types[] = 'masonry-gallery';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'reina_core_register_masonry_gallery_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'reina_core_register_masonry_gallery_for_meta_options' );
}

if ( ! function_exists( 'reina_core_add_masonry_gallery_custom_post_type' ) ) {
	/**
	 * Function that adds masonry_gallery custom post type
	 *
	 * @param array $cpts
	 *
	 * @return array
	 */
	function reina_core_add_masonry_gallery_custom_post_type( $cpts ) {
		$cpts[] = 'ReinaCoreMasonryGalleryCPT';
		
		return $cpts;
	}
	
	add_filter( 'reina_core_filter_register_custom_post_types', 'reina_core_add_masonry_gallery_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class ReinaCoreMasonryGalleryCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Masonry Gallery', 'reina-core' );
			$this->set_base( 'masonry-gallery' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-schedule' );
			$this->set_slug( 'masonry-gallery' );
			$this->set_name( $name );
			$this->set_path( REINA_CORE_CPT_PATH . '/masonry-gallery' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Reina Masonry Gallery', 'reina-core' ),
				'singular_name' => esc_html__( 'Masonry Gallery', 'reina-core' ),
				'add_item'      => esc_html__( 'New Masonry Gallery', 'reina-core' ),
				'add_new_item'  => esc_html__( 'Add New Masonry Gallery', 'reina-core' ),
				'edit_item'     => esc_html__( 'Edit Masonry Gallery', 'reina-core' )
			) );
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports( array(
				'title',
				'thumbnail'
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'masonry-gallery-category',
				'slug'          => 'masonry-gallery-category',
				'singular_name' => esc_html__( 'Category', 'reina-core' ),
				'plural_name'   => esc_html__( 'Categories', 'reina-core' ),
			) );
		}
		
	}
}
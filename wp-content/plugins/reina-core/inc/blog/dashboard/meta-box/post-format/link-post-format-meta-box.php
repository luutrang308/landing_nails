<?php

if ( ! function_exists( 'reina_core_add_link_post_format_meta_box' ) ) {
	/**
	 * Function that add options for post format
	 *
	 * @param mixed $page - general post format meta box section
	 */
	function reina_core_add_link_post_format_meta_box( $page ) {
		
		if ( $page ) {
			$post_format_section = $page->add_section_element(
				array(
					'name'  => 'qodef_post_format_link_section',
					'title' => esc_html__( 'Post Format Link', 'reina-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_link',
					'title'       => esc_html__( 'Link URL', 'reina-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_link_text',
					'title'       => esc_html__( 'Link Text', 'reina-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_link_post_format_meta_box', $page );
		}
	}
	
	add_action( 'reina_core_action_after_blog_single_meta_box_map', 'reina_core_add_link_post_format_meta_box', 4 );
}
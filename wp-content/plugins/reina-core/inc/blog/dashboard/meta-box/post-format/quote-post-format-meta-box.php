<?php

if ( ! function_exists( 'reina_core_add_quote_post_format_meta_box' ) ) {
	/**
	 * Function that add options for post format
	 *
	 * @param mixed $page - general post format meta box section
	 */
	function reina_core_add_quote_post_format_meta_box( $page ) {
		
		if ( $page ) {
			$post_format_section = $page->add_section_element(
				array(
					'name'  => 'qodef_post_format_quote_section',
					'title' => esc_html__( 'Post Format Quote', 'reina-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_post_format_quote_text',
					'title'       => esc_html__( 'Quote Text', 'reina-core' )
				)
			);
			
			$post_format_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_post_format_quote_author',
					'title'       => esc_html__( 'Quote Author', 'reina-core' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_quote_post_format_meta_box', $page );
		}
	}
	
	add_action( 'reina_core_action_after_blog_single_meta_box_map', 'reina_core_add_quote_post_format_meta_box', 5 );
}
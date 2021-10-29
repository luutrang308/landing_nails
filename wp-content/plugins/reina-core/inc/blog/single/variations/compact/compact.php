<?php

if ( ! function_exists ( 'reina_core_add_blog_single_variation_compact' ) ) {
    function reina_core_add_blog_single_variation_compact ( $variations ) {
        $variations[ 'compact' ] = esc_html__ ( 'Compact' , 'reina-core' );

        return $variations;
    }

    add_filter ( 'reina_core_filter_blog_single_layout_options' , 'reina_core_add_blog_single_variation_compact' );
}

if ( ! function_exists ( 'reina_core_disable_page_title_for_blog_single_compact' ) ) {
    /**
     * Function that disable page title area for variation
     *
     * @param $enable_page_title bool
     *
     * @return bool
     */
    function reina_core_disable_page_title_for_blog_single_compact ( $enable_page_title ) {
        $template = reina_core_get_post_value_through_levels ( 'qodef_blog_single_post_template' );

        if ( is_singular ( 'post' ) && 'compact' === $template ) {
            $enable_page_title = false;
        }

        return $enable_page_title;
    }

    add_filter ( 'reina_filter_enable_page_title' , 'reina_core_disable_page_title_for_blog_single_compact' );
}

if ( ! function_exists ( 'reina_core_blog_single_compact_media' ) ) {
    /**
     * Function that load media part template
     *
     */
    function reina_core_blog_single_compact_media () {
        $params   = array ();
        $template = reina_core_get_post_value_through_levels ( 'qodef_blog_single_post_template' );

        if ( is_singular ( 'post' ) && 'compact' === $template ) {
            $params[ 'holder_classes' ]  = array (
                'qodef-e' ,
            );
            $params[ 'content_classes' ] = array (
                'qodef-e-content' ,
            );

            reina_core_template_part ( 'blog' , 'single/variations/compact/layout/media' , '' , $params );
        }
    }

    add_action ( 'reina_action_before_page_inner' , 'reina_core_blog_single_compact_media' );
}

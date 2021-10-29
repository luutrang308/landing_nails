<?php
$post_id       = get_the_ID();
$is_enabled    = reina_core_get_post_value_through_levels( 'qodef_blog_single_enable_related_posts' );
$related_posts = reina_core_get_custom_post_type_related_posts( $post_id, reina_core_get_blog_single_post_taxonomies( $post_id ) );

if ( $is_enabled === 'yes' && ! empty( $related_posts ) && class_exists( 'ReinaCoreBlogListShortcode' ) ) { ?>
	<div id="qodef-related-posts">
		<h4 class="qodef-related-posts-title"><?php esc_html_e( 'Related Articles', 'reina' ); ?></h4>
		<?php
		$params = apply_filters( 'reina_core_filter_blog_single_related_posts_params', array(
			'custom_class'      => 'qodef--no-bottom-space',
			'layout'            => 'related-posts',
			'columns'           => '2',
			'posts_per_page'    => 2,
			'additional_params' => 'id',
			'post_ids'          => $related_posts['items'],
			'title_tag'         => 'h5',
		) );
		
		echo ReinaCoreBlogListShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>

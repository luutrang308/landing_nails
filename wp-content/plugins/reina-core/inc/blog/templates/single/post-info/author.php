<?php
global $post;
$author_id = $post->post_author;
?>

<div class="qodef-e-info-item qodef-e-info-author">
	<span class="qodef-e-info-author-label"><?php esc_html_e( 'By', 'reina' ); ?></span>
	<a itemprop="author" class="qodef-e-info-author-link" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
		<?php the_author_meta( 'display_name', $author_id ); ?>
	</a>
</div>

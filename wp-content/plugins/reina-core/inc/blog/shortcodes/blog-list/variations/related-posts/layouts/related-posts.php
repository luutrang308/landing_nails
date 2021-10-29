<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		reina_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
				reina_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				reina_core_theme_template_part( 'blog', 'templates/parts/post-info/related-title', '', array( 'title_tag' => $title_tag ) );
				
				// Hook to include additional content after blog single content
				do_action( 'reina_action_after_blog_single_content' );
				?>
			</div>
		</div>
	</div>
</article>

<?php

$params[ 'slug' ] = '';

?>

<div id="qodef-media" <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div <?php qode_framework_class_attribute( $content_classes ); ?>>
		<div class="qodef-e-info qodef-info--top">
		<?php
			// Include post date info
			reina_template_part( 'blog', 'templates/parts/post-info/date' );
			// Include post author info
			reina_core_template_part( 'blog', 'templates/single/post-info/author' ); ?>
		</div>
		<?php
		// Include post title
		reina_template_part( 'blog', 'templates/parts/post-info/title', '', array ( 'title_tag' => 'h2' ) );
		?>
	</div>
	<div class="qodef-content-grid">
		<?php
		// Include post featured image
		reina_core_template_part( 'blog', 'templates/single/post-info/media', '', $params );
		?>
	</div>
</div>

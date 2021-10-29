<div class="qodef-e-media">
	<?php switch ( get_post_format() ) {
		case 'gallery':
			reina_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			reina_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			reina_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			reina_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	} ?>
</div>
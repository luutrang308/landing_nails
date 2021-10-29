<div class="qodef-e-media">

	<?php switch ( get_post_format() ) {

		case 'gallery':
			reina_core_theme_template_part( 'blog', 'templates/parts/post-format/gallery','', $params );
			break;
		case 'video':
			reina_core_theme_template_part( 'blog', 'templates/parts/post-format/video','', $params );
			break;
		case 'audio':
			reina_core_theme_template_part( 'blog', 'templates/parts/post-format/audio','', $params );
			break;
		default:
			reina_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/image','', $params );
			break;
	} ?>
</div>
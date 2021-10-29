<?php

switch ( get_post_format() ) {
	case 'video':
		reina_core_template_part( 'blog', 'templates/single/post-info/video', $slug, $params );
		break;
	default:
		reina_core_template_part( 'blog', 'templates/single/post-info/image', $slug, $params );
		break;
}

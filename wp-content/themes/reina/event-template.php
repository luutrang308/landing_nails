<?php

get_header();

// Include event content template
if ( reina_is_installed( 'core' ) ) {
	reina_core_template_part( 'plugins/timetable', 'templates/content' );
}

get_footer();

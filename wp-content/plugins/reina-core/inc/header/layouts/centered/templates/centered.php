<?php

// Include logo
reina_core_get_header_logo_image(); ?>
<div class="qodef-centered-header-wrapper">
	<?php
	// Include widget area two
	reina_core_get_header_widget_area( '', 'two' );
	
	// Include main navigation
	reina_core_template_part( 'header', 'templates/parts/navigation' );
	
	// Include widget area one
	reina_core_get_header_widget_area(); ?>
	
	<?php do_action('reina_action_page_header_centered_template')?>
</div>

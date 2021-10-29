<?php if ( class_exists( 'ReinaCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params = array();
		$params['layout'] = 'list';
		
		echo ReinaCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>
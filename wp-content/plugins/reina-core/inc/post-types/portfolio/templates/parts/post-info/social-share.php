<div class="qodef-e qodef-inof--social-share">
	<?php if ( class_exists( 'ReinaCoreSocialShareShortcode' ) ) {
		$params = array(
			'title'  => esc_html__( 'Share:', 'reina-core' ),
			'layout' => 'list'
		);
		
		echo ReinaCoreSocialShareShortcode::call_shortcode( $params );
	} ?>
</div>
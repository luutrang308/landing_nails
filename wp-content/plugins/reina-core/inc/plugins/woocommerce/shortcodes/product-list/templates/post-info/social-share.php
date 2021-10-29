<?php if ( class_exists( 'ReinaCoreSocialShareShortcode' ) ) { ?>
	<div class="qodef-woo-product-social-share">
		<?php
		$params = array();
		$params['title'] = esc_html__( 'Share:', 'reina-core' );
		
		echo ReinaCoreSocialShareShortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>
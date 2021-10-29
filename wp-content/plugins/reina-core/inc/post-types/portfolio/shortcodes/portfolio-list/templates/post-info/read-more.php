<?php if ( ! post_password_required() && class_exists( 'ReinaCoreButtonShortcode' ) ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$button_params = array(
			'button_link' => get_the_permalink(),
			'text'        => esc_html__( 'Read More', 'reina-core' )
		);
		
		echo ReinaCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>

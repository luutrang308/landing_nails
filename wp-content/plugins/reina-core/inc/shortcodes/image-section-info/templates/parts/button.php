<?php if ( class_exists( 'ReinaCoreButtonShortcode' ) && ! empty( $button_params['text'] ) ) { ?>
	<div class="qodef-m-button">
		<?php echo ReinaCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>
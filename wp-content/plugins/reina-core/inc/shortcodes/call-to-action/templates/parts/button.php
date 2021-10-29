<?php if ( ! empty( $button_params ) && class_exists( 'ReinaCoreButtonShortcode' ) ) { ?>
	<div class="qodef-m-button">
		<?php echo ReinaCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>
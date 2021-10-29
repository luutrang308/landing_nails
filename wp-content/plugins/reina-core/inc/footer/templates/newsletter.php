<div id="qodef-footer-newsletter" <?php echo ($background_color!="" ? ' style="background-color: ' . $background_color .' !important;"' : '') ?> >
	<div class="qodef-content-grid">
		<h5><?php echo esc_html( 'Join Our Newsletter' ); ?></h5>
		<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '"]' ); ?>
	</div>
</div>

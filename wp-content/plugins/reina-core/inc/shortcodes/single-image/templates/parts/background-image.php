<?php if ( ! empty( $background_image ) ) { ?>
	<div class="qodef-m-background">
		<?php echo wp_get_attachment_image( $background_image_params['image_id'], $background_image_params['image_size'] ); ?>
	</div>
<?php } ?>

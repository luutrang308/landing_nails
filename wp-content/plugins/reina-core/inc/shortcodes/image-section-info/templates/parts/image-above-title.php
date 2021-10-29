<?php if ( ! empty( $image_above_title ) ) { ?>
	<div <?php qode_framework_class_attribute( $image_holder_classes ); ?>>
		<?php echo wp_get_attachment_image( $image_above_title, 'full' ); ?>
	</div>
<?php } ?>

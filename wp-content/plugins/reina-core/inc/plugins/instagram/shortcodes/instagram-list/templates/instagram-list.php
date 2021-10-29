<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php if ( ! empty( $list_label ) ) { ?>
		<span class="qodef-m-label" <?php qode_framework_inline_style($label_styles);?>><?php echo esc_html( $list_label ); ?></span>
	<?php } ?>
	<?php echo do_shortcode( "[instagram-feed $instagram_params]" ); // XSS OK ?>
</div>
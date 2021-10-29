<?php if ( ! empty( $text_field) ) { ?>
	<div class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo wp_kses_post( $text_field ); ?></div>
<?php } ?>



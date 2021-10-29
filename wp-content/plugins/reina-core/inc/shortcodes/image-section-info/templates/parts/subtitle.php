<?php if ( ! empty( $subtitle ) ) { ?>
	<span class="qodef-m-subtitle qodef-h7" <?php qode_framework_inline_style( $subtitle_styles ); ?>><?php echo wp_kses_post( $subtitle ); ?></span>
<?php } ?>
<?php if ( ! empty( $svg ) ) { ?>
	<div class="qodef-m-svg" <?php qode_framework_inline_style( $svg_styles ); ?>>
		<?php echo qode_framework_wp_kses_html( 'html', $svg ); ?>
	</div>
<?php } ?>
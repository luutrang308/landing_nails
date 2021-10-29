<?php if ( $icon_type == 'svg-icon' && ! empty ( $svg ) ) { ?>
	<div class="qodef-m-svg" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
		<?php echo qode_framework_wp_kses_html( 'html', $svg ); ?>
	</div>
<?php }

<?php if ( ! empty( $svg ) ) { ?>
	<div class="qodef-m-svg" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
		<?php echo qode_framework_wp_kses_html( 'html', $svg ); ?>
		<?php if ( ! empty( $svg_link ) ) { ?>
			<a itemprop="url" href="<?php echo esc_url( $svg_link ); ?>" target="<?php echo esc_attr( $svg_link_target ); ?>"></a>
		<?php } ?>
	</div>
<?php } ?>

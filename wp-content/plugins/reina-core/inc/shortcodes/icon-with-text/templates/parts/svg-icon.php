<?php if ( $icon_type == 'svg-icon' && ! empty ( $svg ) ) { ?>
	<div class="qodef-m-svg" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
	<?php if ( ! empty( $link ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
	<?php echo qode_framework_wp_kses_html( 'html', $svg ); ?>
	<?php if ( ! empty( $link ) ) : ?>
		</a>
	<?php endif; ?>
	</div>
<?php }

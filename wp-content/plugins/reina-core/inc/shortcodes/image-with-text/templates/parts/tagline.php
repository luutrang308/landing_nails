<?php if ( ! empty( $tagline ) ) { ?>
	<?php if ( ! empty( $svg_link ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $svg_link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
		<span class="qodef-m-tagline" <?php qode_framework_inline_style( $tagline_styles ); ?>><?php echo esc_html( $tagline ); ?></span>
	<?php if ( ! empty( $svg_link ) ) : ?>
		</a>
	<?php endif; ?>
<?php } ?>

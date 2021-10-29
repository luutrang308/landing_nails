<?php if ( ! empty( $content_text ) ) { ?>
	<?php if ( ! empty( $svg_link ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
	<?php endif; ?>
	<p class="qodef-m-text" <?php qode_framework_inline_style( $text_styles ); ?>><?php echo esc_html( $content_text ); ?></p>
	<?php if ( ! empty( $svg_link ) ) : ?>
		</a>
	<?php endif; ?>
<?php } ?>
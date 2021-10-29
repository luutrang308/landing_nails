<?php if ( ! empty( $title ) ) { ?>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
		<?php if ( ! empty( $svg_link ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $svg_link ); ?>" target="<?php echo esc_attr( $svg_link_target ); ?>">
		<?php endif; ?>
			<?php echo esc_html( $title ); ?>
		<?php if ( ! empty( $svg_link ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo esc_attr( $title_tag ); ?>>
<?php } ?>

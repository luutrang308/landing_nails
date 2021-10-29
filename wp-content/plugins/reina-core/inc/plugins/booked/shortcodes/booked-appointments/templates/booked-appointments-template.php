<div class="<?php echo esc_attr( $holder_classes ); ?>">
	<?php if ( ! empty( $title ) ) { ?>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-appointments-title" <?php qode_framework_inline_style( $this_shortcode->get_title_styles( $params ) ); ?>>
			<?php echo wp_kses( $title, array( 'span' => array( 'class' => true ) ) ); ?>
		</<?php echo esc_attr( $title_tag ); ?>>
	<?php } ?>
	<?php echo do_shortcode( '[booked-appointments]' ); ?>
</div>
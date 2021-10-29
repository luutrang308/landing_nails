<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php foreach ( $params['working_hours_params'] as $day => $time ) : ?>
		<div class="qodef-working-hours-item qodef-e">
			<?php if ( ! empty( $day ) ) : ?>
				<span class="qodef-e-day" <?php qode_framework_inline_style( $day_styles ); ?>><?php echo esc_html( str_replace( '_', ' ', $day ) ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $time ) ) { ?>
				<span class="qodef-e-time" <?php qode_framework_inline_style( $time_styles ); ?>><?php echo esc_html( $time ); ?></span>
			<?php } else { ?>
				<span class="qodef-e-time qodef--closed"  <?php qode_framework_inline_style( $time_styles ); ?>><?php esc_html_e( 'Closed', 'reina-core' ); ?></span>
			<?php } ?>
		</div>
	<?php endforeach; ?>
</div>
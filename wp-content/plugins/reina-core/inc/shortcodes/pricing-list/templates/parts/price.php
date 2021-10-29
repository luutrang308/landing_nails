<?php if ( ! empty( $price ) ) { ?>
	<span class="qodef-e-line"></span>
	<span class="qodef-e-price">
		<?php if ( ! empty( $price_label ) ) { ?>
			<span class="qodef-e-price-label"><?php echo esc_html( $price_label ); ?></span>
		<?php } ?>
		<span class="qodef-e-price-value"><?php echo esc_html( $price ); ?></span>
	</span>
<?php } ?>
<?php if ( ! empty( $price ) ) { ?>
	<div class="qodef-m-price">
		<span class="qodef-m-price-value qodef-h1" <?php qode_framework_inline_style( $price_styles ); ?>>
			<?php if ( ! empty( $currency ) ) { ?>
				<span class="qodef-m-price-currency"><?php echo esc_html( $currency ); ?></span>
			<?php } ?>
			<span class="qodef-m-price-value-label"><?php echo esc_html( $price ); ?></span>
		</span>
		<?php if ( ! empty( $price_period ) ) { ?>
			<span class="qodef-m-price-period" <?php qode_framework_inline_style( $price_period_styles ); ?>><?php echo esc_html( $price_period ); ?></span>
		<?php } ?>
	</div>
<?php } ?>
<a itemprop="url" class="qodef-m-opener" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="qodef-m-opener-icon">
		<span class="qodef-m-opener-text"><?php echo esc_html__( 'Cart', 'reina-core' ) ?> </span>
		<?php echo qode_framework_icons()->get_specific_icon_from_pack( 'dropdown-cart', 'linea-icons' ); ?>
	</span>
	<span class="qodef-m-opener-count"><?php echo WC()->cart->cart_contents_count; ?></span>
</a>

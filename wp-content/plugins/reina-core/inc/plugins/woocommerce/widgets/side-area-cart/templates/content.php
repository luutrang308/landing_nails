<?php if ( is_object( WC()->cart ) ) { ?>
	<div class="qodef-m-content">
		<?php
		// Hook to include additional content before cart items
		do_action( 'reina_core_action_woocommerce_before_side_area_cart_content' );
		
		if ( ! WC()->cart->is_empty() ) {
			reina_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/loop' );
			
			reina_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/order-details' );
			
			reina_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/button' );
		} else {
			// Include posts not found
			reina_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/posts-not-found' );
		}
		
		reina_core_template_part( 'plugins/woocommerce/widgets/side-area-cart', 'templates/parts/close' );
		?>
	</div>
<?php } ?>
<?php if ( is_object( WC()->cart ) ) { ?>
	<?php reina_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
	<div class="qodef-m-dropdown">
		<div class="qodef-m-dropdown-inner">
			<?php
			// Hook to include additional content before cart items
			do_action( 'reina_core_action_woocommerce_before_side_area_cart_content' );
			
			if ( ! WC()->cart->is_empty() ) {
				reina_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/loop' );
				
				reina_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/order-details' );
				
				reina_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/button' );
			} else {
			    // Include posts not found
				reina_core_template_part( 'plugins/woocommerce/widgets/dropdown-cart', 'templates/parts/posts-not-found' );
			} ?>
		</div>
	</div>
<?php } ?>
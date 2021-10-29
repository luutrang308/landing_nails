<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-woo-product-image">
		<?php reina_core_template_part( 'plugins/woocommerce/shortcodes/product-banner', 'templates/parts/image', '', $params ) ?>
	
	<div class="qodef-woo-product-content">
		<div class="qodef-woo-product-content-inner" <?php qode_framework_inline_style($content_styles);?>>
			<?php reina_core_template_part( 'plugins/woocommerce/shortcodes/product-banner', 'templates/parts/tagline', '', $params ) ?>
			<?php reina_core_template_part( 'plugins/woocommerce/shortcodes/product-banner', 'templates/parts/title', '', $params ) ?>
		</div>
	</div>
	</div>
	<?php reina_core_template_part( 'plugins/woocommerce/shortcodes/product-banner', 'templates/parts/link', '', $params ) ?>
</div>
<?php
$product_id != '' ? $product_id : '';
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h4';
?>
<<?php echo esc_attr( $title_tag ); ?> itemprop="name" class="qodef-woo-product-title entry-title" <?php qode_framework_inline_style( $title_styles ); ?>>
	<?php echo get_the_title($product_id); ?>
</<?php echo esc_attr( $title_tag ); ?>>
<?php
$product_id != '' ? $product_id : '';
?>
<a itemprop="url" class="qodef-woo-product-link" href="<?php the_permalink($product_id); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>

<?php
$product_id != '' ? $product_id : '';
$has_image = has_post_thumbnail($product_id);
?>

<?php if ( is_array( $image_size ) && count( $image_size ) ) {
	echo qode_framework_generate_thumbnail( get_the_post_thumbnail( $product_id ), $image_params['image_size'][0], $image_params['image_size'][1] );
} else {
	echo get_the_post_thumbnail( $product_id, $image_size );
	
//	var_dump( $image_params );
} ?>



<?php

$image_background_color = '';

if ( $layout === 'standard' && ! empty( $info_background_styles ) ) {
	$image_background_color = $info_background_styles;
}

?>

<div class="qodef-m-image" <?php echo qode_framework_inline_style( $image_background_color ); ?>>
	<?php echo wp_get_attachment_image( $image, 'full' ); ?>
</div>

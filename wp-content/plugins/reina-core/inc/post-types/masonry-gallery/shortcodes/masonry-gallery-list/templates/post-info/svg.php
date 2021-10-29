<?php
$svg    = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_svg', true );
$size   = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_svg_size', true );
$stroke = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_svg_stroke', true );
$fill   = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_svg_fill', true );

$svg_styles = array();

$svg_styles[] = ! empty( $size ) ? 'width:' . $size : '';
$svg_styles[] = ! empty( $stroke ) ? 'stroke:' . $stroke : '';
$svg_styles[] = ! empty( $fill ) ? 'fill:' . $fill : '';

if ( ! empty ( $svg ) ) { ?>
	<div class="qodef-e-svg" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>><?php echo qode_framework_wp_kses_html( 'html', $svg ); ?></div>
<?php }

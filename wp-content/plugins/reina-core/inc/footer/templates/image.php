<?php
$svg_styles = '';

if ( ! empty( $size ) ) {
	$svg_styles .= 'width: ' . $size . '; ';
}
if ( ! empty( $fill ) ) {
	$svg_styles .= 'fill: ' . $fill . '; ';
}
if ( ! empty( $stroke ) ) {
	$svg_styles .= 'stroke: ' . $stroke . '; ';
}
?>

<div id="qodef-footer-image" class="qodef--draw-svg" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
	<?php echo qode_framework_wp_kses_html( 'html', $svg ); ?>
</div>

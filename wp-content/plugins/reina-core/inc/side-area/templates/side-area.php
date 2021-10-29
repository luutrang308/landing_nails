<?php
$svg_icon =  reina_core_get_post_value_through_levels("qodef_side_area_svg");
$size =  reina_core_get_post_value_through_levels("qodef_side_area_svg_size");
$fill =  reina_core_get_post_value_through_levels("qodef_side_area_svg_fill");
$stroke =  reina_core_get_post_value_through_levels("qodef_side_area_svg_stroke");
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

if ( is_active_sidebar( 'qodef-side-area' ) ) { ?>
	<div id="qodef-side-area" <?php qode_framework_class_attribute( $classes ); ?>>
		<?php reina_core_get_opener_icon_html( array(
			'option_name' => 'side_area',
			'custom_id'   => 'qodef-side-area-close'
		), false, true ); ?>
		<div id="qodef-side-area-inner">
			<?php dynamic_sidebar( 'qodef-side-area' ); ?>
		</div>
		
		<?php if ($svg_icon != ""){ ?>
			<div id="qodef-side-area-image" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
				<?php echo qode_framework_wp_kses_html( 'html', $svg_icon ); ?>
			</div>
		<?php } ?>
		
	</div>
<?php } ?>

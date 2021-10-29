<?php
$svg_icon =  reina_core_get_post_value_through_levels("qodef_minimal_header_background_icon");
$size =  reina_core_get_post_value_through_levels("qodef_minimal_header_background_icon_size");
$fill =  reina_core_get_post_value_through_levels("qodef_minimal_header_background_svg_fill");
$stroke =  reina_core_get_post_value_through_levels("qodef_minimal_header_background_svg_stroke");
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

<div id="qodef-fullscreen-area">
	<?php if ( $fullscreen_menu_in_grid ) { ?>
		<div class="qodef-content-grid">
	<?php } ?>
		
		<div id="qodef-fullscreen-area-inner">
			<?php if ( has_nav_menu( 'fullscreen-menu-navigation' ) ) { ?>
				<nav class="qodef-fullscreen-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'fullscreen-menu-navigation',
							'container'         => '',
							'link_before'       => '<span class="qodef-menu-item-text">',
							'link_after'        => '</span>',
							'walker'         => new ReinaCoreRootMainMenuWalker()
						)
					); ?>
				</nav>
			<?php } ?>
		</div>
		
	<?php if ( $fullscreen_menu_in_grid ) { ?>
		</div>
	
	<?php if ($svg_icon != ""){ ?>
		<div id="qodef-fullscreen-area-icon" <?php echo qode_framework_get_inline_style( $svg_styles ); ?>>
			<?php echo qode_framework_wp_kses_html( 'html', $svg_icon ); ?>
		</div>
	<?php } ?>
	
	<?php } ?>
</div>

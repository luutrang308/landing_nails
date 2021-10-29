<?php
$link = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link', true );

if ( ! empty( $link ) && class_exists( 'ReinaCoreButtonShortcode' ) ) {
	$button_label                  = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_button_label', true );
	$link_target                   = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_link_target', true );
	$button_color                  = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_button_text_color', true );
	$button_hover_color            = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_button_text_hover_color', true );
	$button_background_color       = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_button_background_color', true );
	$button_hover_background_color = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_button_background_hover_color', true );
	?>
	<div class="qodef-e-button">
		<?php
		$button_params = array(
			'button_layout'          => 'filled',
			'size'                   => 'large',
			'color'                  => $button_color,
			'hover_color'            => $button_hover_color,
			'background_color'       => $button_background_color,
			'hover_background_color' => $button_hover_background_color,
			'button_link'            => $link,
			'link_target'            => $link_target,
			'text'                   => ! empty( $button_label ) ? $button_label : esc_html__( 'Read More', 'reina-core' )
		);
		
		echo ReinaCoreButtonShortcode::call_shortcode( $button_params ); ?>
	</div>
<?php } ?>

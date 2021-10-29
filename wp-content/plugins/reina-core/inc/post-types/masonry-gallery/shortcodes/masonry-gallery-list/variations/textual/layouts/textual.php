<?php
$hide_title_meta = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_hide_title', true );
$bg_meta         = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_background_color', true );
$alignment_meta  = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_alignment', true );

$item_style = '';

if ( ! empty( $bg_meta ) ) {
	$item_bg = 'background-color:' . $bg_meta . '; ';

	$item_style .= $item_bg;
}

if ( ! empty( $alignment_meta ) ) {
	$alignment = 'text-align:' . $alignment_meta . ';';

	$item_style .= $alignment;
}

?>


<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/image', '', $params ); ?>
		<div class="qodef-e-content" <?php qode_framework_inline_style($item_style);?>>
			<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/tagline', '', $params ); ?>
			<?php if( $hide_title_meta !== 'yes' ) {?>
			<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/title', '', $params ); ?>
			<?php } ?>
			<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/text', '', $params ); ?>
			<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/button', '', $params ); ?>
		</div>
		<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/svg', '', $params ); ?>
		<?php reina_core_list_sc_template_part( 'post-types/masonry-gallery/shortcodes/masonry-gallery-list', 'post-info/link', '', $params ); ?>
	</div>
</div>

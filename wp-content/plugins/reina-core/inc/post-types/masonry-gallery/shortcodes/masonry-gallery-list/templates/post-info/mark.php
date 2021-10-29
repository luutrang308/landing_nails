<?php
$mark = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_mark', true );

if ( ! empty ( $mark ) ) { ?>
	<span class="qodef-e-mark"><?php echo esc_html( $mark ); ?></span>
<?php }
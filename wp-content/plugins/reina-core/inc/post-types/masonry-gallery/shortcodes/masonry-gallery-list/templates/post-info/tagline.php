<?php
$tagline = get_post_meta( get_the_ID(), 'qodef_masonry_gallery_item_tagline', true );

if ( ! empty ( $tagline ) ) { ?>
	<span class="qodef-e-tagline"><?php echo esc_html( $tagline ); ?></span>
<?php }
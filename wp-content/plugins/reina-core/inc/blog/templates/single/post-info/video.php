<?php

$video_meta = get_post_meta( get_the_ID(), 'qodef_post_format_video_url', true );

if ( ! empty( $video_meta ) ) {
	$oembed = wp_oembed_get( $video_meta );

	if ( ! empty( $oembed ) ) {
		echo wp_oembed_get( $video_meta );
	} else { ?>

        <div class="qodef-e-media-video">
            <video autoplay="autoplay" loop="loop" muted="muted" playsinline>
                <source src="<?php echo esc_url( $video_meta ); ?>" type="video/mp4">
            </video>
        </div>

	<?php }
} else {
	// Include featured image
	reina_core_template_part( 'blog', 'templates/single/post-info/image', $slug );
} ?>

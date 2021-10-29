<?php if ( ! empty( $video_link ) ) { ?>
	<a itemprop="url" class="qodef-m-play qodef-magnific-popup qodef-popup-item" <?php echo qode_framework_get_inline_style( $play_button_styles ); ?> href="<?php echo esc_url( $video_link ); ?>" data-type="iframe">
		<span class="qodef-m-play-inner">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="55.2px" height="55.2px" viewBox="0 0 55.2 55.2" style="enable-background:new 0 0 55.2 55.2;" xml:space="preserve">
				<circle cx="27.6" cy="27.6" r="27.1"/>
				<path d="M40.4,28.2L20.1,16.5c-0.3-0.2-0.8,0.1-0.8,0.5v23.4c0,0.4,0.4,0.7,0.8,0.5l20.3-11.7  C40.7,28.9,40.7,28.4,40.4,28.2z"/>
			</svg>
		</span>
	</a>
<?php } ?>
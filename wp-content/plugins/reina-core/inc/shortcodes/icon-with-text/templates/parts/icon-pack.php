<?php

if( ! empty( $link ) ) {
	$icon_params['link']   = $link;
	$icon_params['target'] = $target;
}

if ( $icon_type == 'icon-pack' ) {
	echo ReinaCoreIconShortcode::call_shortcode( $icon_params );
}
<?php

include_once REINA_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/variations/info-follow/hover-animations/hover-animations.php';

foreach ( glob( REINA_CORE_CPT_PATH . '/portfolio/shortcodes/portfolio-list/variations/info-follow/hover-animations/*/include.php' ) as $animation ) {
	include_once $animation;
}
<?php

include_once REINA_CORE_SHORTCODES_PATH . '/image-section-info/image-section-info.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/image-section-info/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
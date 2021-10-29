<?php

include_once REINA_CORE_SHORTCODES_PATH . '/single-image/single-image.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
<?php

include_once REINA_CORE_SHORTCODES_PATH . '/stacked-images/stacked-images.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/stacked-images/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
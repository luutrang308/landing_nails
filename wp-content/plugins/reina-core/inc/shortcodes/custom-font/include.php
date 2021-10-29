<?php

include_once REINA_CORE_SHORTCODES_PATH . '/custom-font/custom-font.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
<?php

include_once REINA_CORE_SHORTCODES_PATH . '/button/button.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
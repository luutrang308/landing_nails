<?php

include_once REINA_CORE_SHORTCODES_PATH . '/banner/banner.php';

foreach ( glob( REINA_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
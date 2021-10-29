<?php

include_once REINA_CORE_SHORTCODES_PATH . '/countdown/countdown.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/countdown/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
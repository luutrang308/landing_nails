<?php

include_once REINA_CORE_SHORTCODES_PATH . '/counter/counter.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/counter/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
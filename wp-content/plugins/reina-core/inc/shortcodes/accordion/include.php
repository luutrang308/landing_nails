<?php

include_once REINA_CORE_SHORTCODES_PATH . '/accordion/accordion.php';
include_once REINA_CORE_SHORTCODES_PATH . '/accordion/accordion-child.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
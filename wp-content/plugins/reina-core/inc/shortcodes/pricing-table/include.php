<?php

include_once REINA_CORE_SHORTCODES_PATH . '/pricing-table/pricing-table.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/pricing-table/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
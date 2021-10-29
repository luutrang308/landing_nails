<?php

include_once REINA_CORE_SHORTCODES_PATH . '/call-to-action/call-to-action.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/call-to-action/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
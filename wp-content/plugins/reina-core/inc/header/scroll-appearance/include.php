<?php

include_once REINA_CORE_INC_PATH . '/header/scroll-appearance/helper.php';

foreach ( glob( REINA_CORE_INC_PATH . '/header/scroll-appearance/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}

foreach ( glob( REINA_CORE_INC_PATH . '/header/scroll-appearance/*/include.php' ) as $appearance ) {
	include_once $appearance;
}
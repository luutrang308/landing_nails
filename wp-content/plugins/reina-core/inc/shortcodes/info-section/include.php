<?php

include_once REINA_CORE_SHORTCODES_PATH . '/info-section/info-section.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/info-section/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
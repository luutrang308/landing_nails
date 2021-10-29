<?php

include_once REINA_CORE_SHORTCODES_PATH . '/background-svg/background-svg.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/background-svg/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}

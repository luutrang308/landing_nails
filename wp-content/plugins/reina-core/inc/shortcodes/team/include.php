<?php

include_once REINA_CORE_SHORTCODES_PATH . '/team/team.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/team/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
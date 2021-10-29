<?php

include_once REINA_CORE_SHORTCODES_PATH . '/image-with-text/image-with-text.php';

foreach ( glob( REINA_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
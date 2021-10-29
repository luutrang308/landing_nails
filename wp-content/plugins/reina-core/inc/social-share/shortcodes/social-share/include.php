<?php

include_once REINA_CORE_INC_PATH . '/social-share/shortcodes/social-share/social-share.php';

foreach ( glob( REINA_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
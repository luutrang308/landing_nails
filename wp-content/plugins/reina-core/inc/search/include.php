<?php

include_once REINA_CORE_INC_PATH . '/search/search.php';
include_once REINA_CORE_INC_PATH . '/search/helper.php';
include_once REINA_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( REINA_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}

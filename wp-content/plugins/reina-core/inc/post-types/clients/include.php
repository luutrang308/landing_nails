<?php

include_once REINA_CORE_CPT_PATH . '/clients/helper.php';

foreach ( glob( REINA_CORE_CPT_PATH . '/clients/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}
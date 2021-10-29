<?php

include_once REINA_CORE_PLUGINS_PATH . '/timetable/timetable.php';

foreach ( glob( REINA_CORE_PLUGINS_PATH . '/timetable/dashboard/meta-box/*.php' ) as $module ) {
	include_once $module;
}

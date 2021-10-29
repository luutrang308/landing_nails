<?php

include_once REINA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-banner/product-banner.php';

foreach ( glob( REINA_CORE_PLUGINS_PATH . '/woocommerce/shortcodes/product-banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
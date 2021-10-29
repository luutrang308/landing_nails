<?php

include_once REINA_CORE_CPT_PATH . '/masonry-gallery/shortcodes/masonry-gallery-list/masonry-gallery-list.php';

foreach ( glob( REINA_CORE_CPT_PATH . '/masonry-gallery/shortcodes/masonry-gallery-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
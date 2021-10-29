<?php

class ReinaCoreElementorProductBanner extends ReinaCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'reina_core_product_banner' );
		
		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	reina_core_get_elementor_widgets_manager()->register_widget_type( new ReinaCoreElementorProductBanner() );
}

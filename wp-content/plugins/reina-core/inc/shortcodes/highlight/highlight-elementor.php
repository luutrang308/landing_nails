<?php

class ReinaCoreElementorHighlight extends ReinaCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'reina_core_highlight' );
		
		parent::__construct( $data, $args );
	}
}

reina_core_get_elementor_widgets_manager()->register_widget_type( new ReinaCoreElementorHighlight() );
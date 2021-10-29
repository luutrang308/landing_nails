<?php

class ReinaCoreElementorBookedCalendar extends ReinaCoreElementorWidgetBase {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'reina_core_booked_calendar' );
		
		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'booked' ) ) {
	reina_core_get_elementor_widgets_manager()->register_widget_type( new ReinaCoreElementorBookedCalendar() );
}
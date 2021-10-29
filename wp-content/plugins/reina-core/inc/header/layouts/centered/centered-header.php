<?php

class CenteredHeader extends ReinaCoreHeader {
	private static $instance;

	public function __construct() {
		$this->set_layout( 'centered' );
		$this->default_header_height = 150;
		$this->set_search_layout( 'minimal' );

		parent::__construct();
	}
	
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}

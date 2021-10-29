<?php
if ( ! function_exists( 'reina_core_filter_portfolio_list_info_follow_animation_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function reina_core_filter_portfolio_list_info_follow_animation_options( $options ) {
		$hover_option  = array();
		$option_filter = apply_filters( 'reina_core_filter_portfolio_list_info_follow_animation_options', array() );
		$options_map   = reina_core_get_variations_options_map( $option_filter );
		
		$option = array(
			'field_type'    => 'select',
			'name'          => 'hover_animation_info-follow',
			'title'         => esc_html__( 'Hover Animation', 'reina-core' ),
			'options'       => $option_filter,
			'default_value' => $options_map['default_value'],
			'dependency'    => array(
				'show' => array(
					'layout' => array(
						'values'        => 'info-follow',
						'default_value' => ''
					)
				)
			),
			'group'         => esc_html__( 'Layout', 'reina-core' ),
			'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
		);
		
		$hover_option[] = $option;
		
		return array_merge( $options, $hover_option );
	}
	
	add_filter( 'reina_core_filter_portfolio_list_hover_animation_options', 'reina_core_filter_portfolio_list_info_follow_animation_options' );
}
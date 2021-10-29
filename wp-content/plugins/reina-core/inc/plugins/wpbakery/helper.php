<?php

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = REINA_CORE_PLUGINS_PATH . '/wpbakery/templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'reina_core_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function reina_core_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'reina-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'reina-core' ) => 'full-width',
					esc_html__( 'In Grid', 'reina-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'reina-core' ),
				'value'      => array(
					esc_html__( 'Default', 'reina-core' ) => '',
					esc_html__( 'Left', 'reina-core' )    => 'left',
					esc_html__( 'Center', 'reina-core' )  => 'center',
					esc_html__( 'Right', 'reina-core' )   => 'right'
				),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_bg_image',
				'heading'    => esc_html__( 'Parallax Background Image', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Parallax Section Height (px)', 'reina-core' ),
				'dependency' => array( 'element' => 'parallax_bg_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		do_action( 'reina_core_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Row Content Width', 'reina-core' ),
				'value'      => array(
					esc_html__( 'Full Width', 'reina-core' ) => 'full-width',
					esc_html__( 'In Grid', 'reina-core' )    => 'grid'
				),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_alignment',
				'heading'    => esc_html__( 'Content Alignment', 'reina-core' ),
				'value'      => array(
					esc_html__( 'Default', 'reina-core' ) => '',
					esc_html__( 'Left', 'reina-core' )    => 'left',
					esc_html__( 'Center', 'reina-core' )  => 'center',
					esc_html__( 'Right', 'reina-core' )   => 'right'
				),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_bg_image',
				'heading'    => esc_html__( 'Parallax Background Image', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Parallax Section Height (px)', 'reina-core' ),
				'dependency' => array( 'element' => 'parallax_bg_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		
	}
	
	add_action( 'vc_after_init', 'reina_core_vc_row_map' );
}

if ( ! function_exists( 'reina_core_vc_column_map' ) ) {
	/**
	 * Map VC Column shortcode
	 * Hooks on vc_after_init action
	 */
	function reina_core_vc_column_map() {
		
		/******* VC Column shortcode - begin *******/
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		vc_add_param( 'vc_column',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		/******* VC Column Inner shortcode - begin *******/
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1440',
				'heading'    => esc_html__( 'Responsive Padding Under 1440', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1366',
				'heading'    => esc_html__( 'Responsive Padding Under 1366', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1280',
				'heading'    => esc_html__( 'Responsive Padding Under 1280', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_1024',
				'heading'    => esc_html__( 'Responsive Padding Under 1024', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_768',
				'heading'    => esc_html__( 'Responsive Padding Under 768', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		vc_add_param( 'vc_column_inner',
			array(
				'type'       => 'textfield',
				'param_name' => 'column_responsive_padding_680',
				'heading'    => esc_html__( 'Responsive Padding Under 680', 'reina-core' ),
				'group'      => esc_html__( 'Reina Core Settings', 'reina-core' )
			)
		);
		
	}
	
	add_action( 'vc_after_init', 'reina_core_vc_column_map' );
}

if ( ! function_exists( 'reina_core_add_html_before_wrapper_open' ) ) {
	/**
	 * Function that override main row html content with our features
	 *
	 * @param string $html
	 * @param array $atts
	 *
	 * @return string that contains html content
	 */
	function reina_core_add_html_before_wrapper_open( $html, $atts ) {
		
		if ( $atts['parallax_bg_image'] !== '' ) {
			$styles  = array();
			
			if ( $atts['parallax_bg_height'] !== '' ) {
				if ( qode_framework_string_ends_with_space_units( $atts['parallax_bg_height'], true ) ) {
					$styles[] = 'height: ' . $atts['parallax_bg_height'];
				} else {
					$styles[] = 'height: ' . intval( $atts['parallax_bg_height'] ) . 'px';
				}
			}
			
			$html .= '<div class="qodef-vc-row-wrapper qodef-parallax qodef--parallax-row" ' . qode_framework_get_inline_style( $styles ) . '>';
			$html .= '<div class="qodef-parallax-img-holder"><div class="qodef-parallax-img-wrapper">' . wp_get_attachment_image( $atts['parallax_bg_image'], 'full', false, array( 'class' => 'qodef-parallax-img' ) ) . '</div></div>';
		}
		
		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '<div class="qodef-content-grid">';
		}
		
		return $html;
	}
	
	add_filter( 'reina_core_filter_vc_row_before_wrapper_open', 'reina_core_add_html_before_wrapper_open', 10, 2 );
	add_filter( 'reina_core_filter_vc_row_inner_before_wrapper_open', 'reina_core_add_html_before_wrapper_open', 10, 2 );
}

if ( ! function_exists( 'reina_core_add_html_after_wrapper_close' ) ) {
	/**
	 * Function that override main row html content with our features
	 *
	 * @param string $html
	 * @param array $atts
	 *
	 * @return string that contains html content
	 */
	function reina_core_add_html_after_wrapper_close( $html, $atts ) {
		
		if ( $atts['row_content_width'] === 'grid' ) {
			$html .= '</div>';
		}
		
		if ( $atts['parallax_bg_image'] !== '' ) {
			$html .= '</div>';
		}
		
		return $html;
	}
	
	add_filter( 'reina_core_filter_vc_row_after_wrapper_close', 'reina_core_add_html_after_wrapper_close', 10, 2 );
	add_filter( 'reina_core_filter_vc_row_inner_after_wrapper_close', 'reina_core_add_html_after_wrapper_close', 10, 2 );
}

if ( ! function_exists( 'reina_core_add_additional_classes_on_row' ) ) {
	/**
	 * Function that add additional classes for row shortcode
	 *
	 * @param string $classes
	 * @param string $base
	 * @param array $atts
	 *
	 * @return string
	 */
	function reina_core_add_additional_classes_on_row( $classes, $base, $atts ) {
		if ( $base == 'vc_row' || $base == 'vc_row_inner' ) {
			
			if ( $atts['content_text_alignment'] !== '' ) {
				$classes .= ' qodef-content-alignment-' . $atts['content_text_alignment'];
			}
		}
		
		return $classes;
	}
	
	add_filter( 'vc_shortcodes_css_class', 'reina_core_add_additional_classes_on_row', 10, 3 );
}

if ( ! function_exists( 'reina_core_init_vc_column_class' ) ) {
	/**
	 * Function that add additional classes for row column shortcode
	 *
	 * @param string $classes
	 * @param string $base
	 * @param array $atts
	 *
	 * @return string
	 */
	function reina_core_init_vc_column_class( $classes, $base, $atts ) {
		if ( $base == 'vc_column' || $base == 'vc_column_inner' ) {
			if ( isset( $atts['css'] ) ) {
				$css_custom_class = current( explode( '{', $atts['css'] ) );
				$screen_sizes     = array( '1440', '1366', '1280', '1024', '768', '680' );
				
				foreach ( $screen_sizes as $screen_size ) {
					if ( isset( $atts[ 'column_responsive_padding_' . $screen_size ] ) && $atts[ 'column_responsive_padding_' . $screen_size ] !== '' ) {
						$padding = $atts[ 'column_responsive_padding_' . $screen_size ];
						
						add_filter( 'reina_core_filter_add_responsive_' . $screen_size . '_inline_style_in_footer', function ( $style ) use ( $css_custom_class, $padding ) {
							$styles = array();
							
							if ( ! empty( $padding ) ) {
								$styles['padding'] = $padding . '!important';
							}
							
							$style .= qode_framework_dynamic_style( $css_custom_class, $styles );
							
							return $style;
						} );
					}
				}
			}
		}
		
		return $classes;
	}
	
	add_filter( 'vc_shortcodes_css_class', 'reina_core_init_vc_column_class', 10, 3 );
}
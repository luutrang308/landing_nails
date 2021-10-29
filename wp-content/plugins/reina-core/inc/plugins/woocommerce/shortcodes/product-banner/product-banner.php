<?php

if ( ! function_exists( 'reina_core_add_product_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_product_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCoreProductBannerShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_product_banner_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCoreProductBannerShortcode extends ReinaCoreShortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_product_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'reina_core_filter_product_banner_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-banner');
			$this->set_base( 'reina_core_product_banner' );
			$this->set_name( esc_html__( 'Product Banner', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds product banner element', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' ),
			) );
			
			$options_map = reina_core_get_variations_options_map( $this->get_layouts() );
			
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'reina-core' ),
				'options'       => $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'product_id',
				'title'      => esc_html__( 'Select Product (by ID)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'reina-core' ),
				'description'=> esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tagline',
				'title'      => esc_html__( 'Tagline', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'tagline_color',
				'title'      => esc_html__( 'tagline Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link_url',
				'title'      => esc_html__( 'Link', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'reina-core' ),
				'options'       => reina_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'content_top_offset',
				'title'      => esc_html__( 'Content Top Offset', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'content_left_offset',
				'title'      => esc_html__( 'Content Left Offset', 'reina-core' ),
				'group'      => esc_html__( 'Content', 'reina-core' ),
			) );
			
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['image_params']   = $this->generate_image_params( $atts );
			$atts['tagline_styles'] = $this->get_tagline_styles( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['content_styles'] = $this->get_content_styles( $atts );
			
			return reina_core_get_template_part( 'plugins/woocommerce/shortcodes/product-banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-woo-product-banner';
			$holder_classes[] = ! empty ( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function generate_image_params( $atts ) {
			$image_size = array();
			
			if ( ! empty( $atts['product_id'] ) ) {
				
				
				$image_size = trim( $atts['image_size'] );
				preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
				if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
					$atts['image_size'] = $image_size;
				} elseif ( ! empty( $matches[0] ) ) {
					$atts['image_size'] = array(
						$matches[0][0],
						$matches[0][1]
					);
				} else {
					$atts['image_size'] = 'full';
				}
			}
			
			return $image_size;
		}
		
		private function get_tagline_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['tagline_color'] ) ) {
				$styles[] = 'color: ' . $atts['tagline_color'];
			}
			
			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			return $styles;
		}
		
		private function get_content_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['content_top_offset'] ) ) {
				$styles[] = 'top: ' . $atts['content_top_offset'];
			}
			
			if ( ! empty( $atts['content_left_offset'] ) ) {
				$styles[] = 'left: ' . $atts['content_left_offset'];
			}
			
			return $styles;
		}
	}
}
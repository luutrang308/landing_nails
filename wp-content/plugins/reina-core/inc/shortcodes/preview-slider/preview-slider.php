<?php

if ( ! function_exists( 'reina_core_add_preview_slider_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function reina_core_add_preview_slider_shortcode( $shortcodes ) {
		$shortcodes[] = 'ReinaCorePreviewSliderShortcode';

		return $shortcodes;
	}

	add_filter( 'reina_core_filter_register_shortcodes', 'reina_core_add_preview_slider_shortcode' );
}

if ( class_exists( 'ReinaCoreShortcode' ) ) {
	class ReinaCorePreviewSliderShortcode extends ReinaCoreShortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'reina_core_filter_preview_slider_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( REINA_CORE_SHORTCODES_URL_PATH . '/preview-slider' );
			$this->set_base( 'reina_core_preview_slider' );
			$this->set_name( esc_html__( 'Preview Slider', 'reina-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds slide to preview slider holder', 'reina-core' ) );
			$this->set_category( esc_html__( 'Reina Core', 'reina-core' ) );
			$this->set_scripts(
				array(
					'slick' => array(
						'registered'	=> false,
						'url'			=> REINA_CORE_INC_URL_PATH . '/shortcodes/preview-slider/assets/js/plugins/slick.min.js',
						'dependency'	=> array( 'jquery' )
					)
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'reina-core' ),
			) );
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'position',
					'title'      => esc_html__( 'Position', 'reina-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'reina-core' ),
						'center' => esc_html__( 'Center', 'reina-core' ),
						'left'   => esc_html__( 'Left', 'reina-core' ),
						'right'  => esc_html__( 'Right', 'reina-core' ),
					),
				)
			);
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'autoplay_speed',
				'title'       => esc_html__( 'Autoplay Speed', 'reina-core' ),
				'description' => esc_html__( 'Enter autoplay speed interval in milliseconds. (default is 2000)', 'reina-core' )
			) );
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'initially_hide_device',
					'title'      => esc_html__( 'Initially hide one device', 'reina-core' ),
					'options'    => array(
						''       => esc_html__( 'Default', 'reina-core' ),
						'phone'  => esc_html__( 'Hide Phone', 'reina-core' ),
						'tablet' => esc_html__( 'Hide Tablet', 'reina-core' ),
						'laptop' => esc_html__( 'Hide Laptop', 'reina-core' ),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'show_device_on_tablet',
					'title'      => esc_html__( 'Show device on tablet', 'reina-core' ),
					'options'    => array(
						'phone'  => esc_html__( 'Show Phone', 'reina-core' ),
						'tablet' => esc_html__( 'Show Tablet', 'reina-core' ),
						'laptop' => esc_html__( 'Show Laptop', 'reina-core' ),
					),
					'default_value' => 'laptop',
					'description' => esc_html__( 'Choose device that will be shown on tablets - below 768px', 'reina-core' ),
				)
			);
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'mobile_holder_margin',
				'title'       => esc_html__( 'Phone Holder Margin', 'reina-core' ),
				'description' => esc_html__( 'Enter holder margin in format: top right bottom left (ex. 5% 5% 5% 5%)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'mobile_holder_order',
				'title'       => esc_html__( 'Phone Holder Order', 'reina-core' ),
				'description' => esc_html__( 'Enter holder order (e.g. 1, 2 or 3).)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'laptop_holder_margin',
				'title'       => esc_html__( 'Laptop Holder Margin', 'reina-core' ),
				'description' => esc_html__( 'Enter holder margin in format: top right bottom left (ex. 5% 5% 5% 5%)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'laptop_holder_order',
				'title'       => esc_html__( 'Laptop Holder Order', 'reina-core' ),
				'description' => esc_html__( 'Enter holder order (e.g. 1, 2 or 3).)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'tablet_holder_margin',
				'title'       => esc_html__( 'Tablet Holder Margin', 'reina-core' ),
				'description' => esc_html__( 'Enter holder margin in format: top right bottom left (ex. 5% 5% 5% 5%)', 'reina-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'tablet_holder_order',
				'title'       => esc_html__( 'Tablet Holder Order', 'reina-core' ),
				'description' => esc_html__( 'Enter holder order (e.g. 1, 2 or 3).)', 'reina-core' ),
			) );
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Image Items', 'reina-core' ),
					'items'      => array(
						array(
							'field_type'  => 'image',
							'name'        => 'ps_mobile_image',
							'title'       => esc_html__('Phone Image', 'reina-core'),
							'description' => esc_html__( 'Provide image in dimensions 108x226px', 'reina-core' ),
						),
						array(
							'field_type' => 'image',
							'name'       => 'ps_laptop_image',
							'title'      => esc_html__('Laptop Image', 'reina-core'),
							'description' => esc_html__( 'Provide image in dimensions 479x335px', 'reina-core' ),
						),
						array(
							'field_type'  => 'image',
							'name'        => 'ps_tablet_image',
							'title'       => esc_html__('Tablet Image', 'reina-core'),
							'description' => esc_html__( 'Provide image in dimensions 222x319px', 'reina-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'ps_link',
							'title'      => esc_html__('Link', 'reina-core'),
						),
						array(
							'field_type'    => 'select',
							'name'          => 'ps_target',
							'title'         => esc_html__( 'Link Target', 'reina-core' ),
							'options'       => reina_core_get_select_type_options_pool( 'link_target' ),
							'default_value' => '_self',
						),
					),
				)
			);
		}

		public function load_assets() {
			wp_enqueue_script( 'slick');
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['slider_classes'] = $this->get_slider_classes( $atts );
			$atts['autoplay']       = 'yes';

			$atts['items']                  = $this->parse_repeater_items( $atts['children'] );
			$atts['slider_data']            = $this->get_slider_data( $atts );
			$atts['mobile_holder_styles']   = $this->get_mobile_holder_styles( $atts );
			$atts['tablet_holder_styles']   = $this->get_tablet_holder_styles( $atts );
			$atts['laptop_holder_styles']   = $this->get_laptop_holder_styles( $atts );
			$atts['this_shortcode']         = $this;

			return reina_core_get_template_part( 'shortcodes/preview-slider', 'templates/preview-slider', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-preview-slider';
			$holder_classes[] = ! empty( $atts['position'] ) ? 'qodef-position--' . $atts['position'] : '';
			$holder_classes[] = ! empty( $atts['initially_hide_device'] ) ? 'qodef-initially-hide--' . $atts['initially_hide_device'] : '';
			$holder_classes[] = ! empty( $atts['show_device_on_tablet'] ) ? 'qodef-show-on-tablet--' . $atts['show_device_on_tablet'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_slider_classes( $atts ) {
			$slider_classes = array();

			return implode( ' ', $slider_classes );
		}

		private function get_slider_data( $atts ) {

			$data = array();

			if ( $atts['autoplay'] != '' ) {
				$data['data-autoplay'] = $atts['autoplay'];
			}

			if ( $atts['autoplay_speed'] != '' ) {
				$data['data-autoplay-speed'] = $atts['autoplay_speed'];
			}

			return $data;
		}

		private function get_mobile_holder_styles( $atts ) {
			$styles = array();

			if ( $atts['mobile_holder_margin'] !== '' ) {
				$styles[] = 'margin: ' . $atts['mobile_holder_margin'];
			}

			if ( $atts['mobile_holder_order'] !== '' ) {
				$styles[] = 'order: ' . $atts['mobile_holder_order'];
			}

			return $styles;
		}

		private function get_laptop_holder_styles( $atts ) {
			$styles = array();

			if ( $atts['laptop_holder_margin'] !== '' ) {
				$styles[] = 'margin: ' . $atts['laptop_holder_margin'];
			}

			if ( $atts['laptop_holder_order'] !== '' ) {
				$styles[] = 'order: ' . $atts['laptop_holder_order'];
			}

			return $styles;
		}

		private function get_tablet_holder_styles( $atts ) {
			$styles = array();

			if ( $atts['tablet_holder_margin'] !== '' ) {
				$styles[] = 'margin: ' . $atts['tablet_holder_margin'];
			}

			if ( $atts['tablet_holder_order'] !== '' ) {
				$styles[] = 'order: ' . $atts['tablet_holder_order'];
			}

			return $styles;
		}
	}
}


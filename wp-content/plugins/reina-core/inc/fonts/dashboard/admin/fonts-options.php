<?php

if ( ! function_exists( 'reina_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function reina_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => REINA_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'reina-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'reina-core' ),
				'icon'        => 'fa fa-cog'
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'reina-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts'
					)
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'reina-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'reina-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'reina-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'reina-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type'  => 'googlefont',
				'name'        => 'qodef_choose_google_font',
				'title'       => esc_html__( 'Google Font', 'reina-core' ),
				'description' => esc_html__( 'Choose Google Font', 'reina-core' ),
				'args'        => array(
					'include' => 'google-fonts'
				)
			) );

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'reina-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'reina-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'reina-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'reina-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'reina-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'reina-core' ),
						'300'  => esc_html__( '300 Light', 'reina-core' ),
						'300i' => esc_html__( '300 Light Italic', 'reina-core' ),
						'400'  => esc_html__( '400 Regular', 'reina-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'reina-core' ),
						'500'  => esc_html__( '500 Medium', 'reina-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'reina-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'reina-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'reina-core' ),
						'700'  => esc_html__( '700 Bold', 'reina-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'reina-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'reina-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'reina-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'reina-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'reina-core' )
					)
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'reina-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'reina-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'reina-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'reina-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'reina-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'reina-core' ),
						'greek'        => esc_html__( 'Greek', 'reina-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'reina-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'reina-core' )
					)
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'reina-core' ),
					'description' => esc_html__( 'Add custom fonts', 'reina-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'reina-core' )
				)
			);

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_ttf',
				'title'      => esc_html__( 'Custom Font TTF', 'reina-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_otf',
				'title'      => esc_html__( 'Custom Font OTF', 'reina-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff',
				'title'      => esc_html__( 'Custom Font WOFF', 'reina-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'file',
				'name'       => 'qodef_custom_font_woff2',
				'title'      => esc_html__( 'Custom Font WOFF2', 'reina-core' ),
				'args'       => array(
					'allowed_type' => 'application/octet-stream'
				)
			) );

			$page_repeater->add_field_element( array(
				'field_type' => 'text',
				'name'       => 'qodef_custom_font_name',
				'title'      => esc_html__( 'Custom Font Name', 'reina-core' ),
			) );

			// Hook to include additional options after module options
			do_action( 'reina_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'reina_core_action_default_options_init', 'reina_core_add_fonts_options', reina_core_get_admin_options_map_position( 'fonts' ) );
}
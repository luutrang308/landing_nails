<?php

if ( ! function_exists ( 'reina_core_add_social_icons_group_widget' ) ) {
    /**
     * function that add widget into widgets list for registration
     *
     * @param array $widgets
     *
     * @return array
     */
    function reina_core_add_social_icons_group_widget ( $widgets ) {
        $widgets[] = 'ReinaCoreSocialIconsGroupWidget';

        return $widgets;
    }

    add_filter ( 'reina_core_filter_register_widgets', 'reina_core_add_social_icons_group_widget' );
}

if ( class_exists ( 'QodeFrameworkWidget' ) ) {
    class ReinaCoreSocialIconsGroupWidget extends QodeFrameworkWidget
    {
        public $no_of_icons = 6;

        public function map_widget () {
            $this -> set_base ( 'reina_core_social_icons_group' );
            $this -> set_name ( esc_html__ ( 'Reina Social Icons Group', 'reina-core' ) );
            $this -> set_description ( sprintf ( esc_html__ ( 'Use this widget to add a group of up to %s social icons to a widget area.', 'reina-core' ), $this -> no_of_icons ) );
            $this -> set_widget_option (
                array (
                    'field_type' => 'text',
                    'name'       => 'widget_title',
                    'title'      => esc_html__ ( 'Title', 'reina-core' ),
                )
            );
            $this -> set_widget_option ( array (
                'field_type'    => 'select',
                'name'          => 'icon_layout',
                'title'         => esc_html__ ( 'Layout', 'reina-core' ),
                'options'       => array (
                    'normal' => esc_html__ ( 'Normal', 'reina-core' ),
                    'circle' => esc_html__ ( 'Circle', 'reina-core' ),
                    'square' => esc_html__ ( 'Square', 'reina-core' ),
                ),
                'default_value' => 'normal',
            ) );
	        $this -> set_widget_option ( array (
		        'field_type'    => 'select',
		        'name'          => 'icon_alignment',
		        'title'         => esc_html__ ( 'Icon Alignment', 'reina-core' ),
		        'options'       => array (
			        'left' => esc_html__ ( 'Left', 'reina-core' ),
			        'center' => esc_html__ ( 'Center', 'reina-core' ),
			        'right' => esc_html__ ( 'Right', 'reina-core' ),
		        ),
		        'default_value' => 'left',
	        ) );
            for ( $i = 1 ; $i <= $this -> no_of_icons ; $i ++ ) {
                $this -> set_widget_option (
                    array (
                        'field_type' => 'iconpack',
                        'name'       => 'main_icon_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'text',
                        'name'       => 'link_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Link %s', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type'    => 'select',
                        'name'          => 'target_' . $i,
                        'title'         => sprintf ( esc_html__ ( 'Link %s Target', 'reina-core' ), $i ),
                        'options'       => reina_core_get_select_type_options_pool ( 'link_target', false ),
                        'default_value' => '_blank',
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'text',
                        'name'       => 'custom_size_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Size', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'text',
                        'name'       => 'margin_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Margin', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'color',
                        'name'       => 'icon_color_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Color', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'color',
                        'name'       => 'icon_background_color_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Background Color', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'color',
                        'name'       => 'icon_hover_color_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Hover Color', 'reina-core' ), $i ),
                    )
                );
                $this -> set_widget_option (
                    array (
                        'field_type' => 'color',
                        'name'       => 'icon_hover_background_color_' . $i,
                        'title'      => sprintf ( esc_html__ ( 'Icon %s Hover Background Color', 'reina-core' ), $i ),
                    )
                );
            }
        }
        
        
        public function render ( $atts ) { ?>
	        
            <div class="qodef-social-icons-group" style="text-align: <?php echo $atts['icon_alignment'] ?>;">
                <?php for ( $i = 1 ; $i <= $this -> no_of_icons ; $i ++ ) {
                    $selected_icon_pack = str_replace ( '-', '_', $atts[ 'main_icon_' . $i ] );

                    if ( ! empty( $atts[ 'main_icon_' . $i . '_' . $selected_icon_pack ] ) ) {
                        $params = array (
                            'main_icon'                        => $atts[ 'main_icon_' . $i ],
                            'main_icon_' . $selected_icon_pack => $atts[ 'main_icon_' . $i . '_' . $selected_icon_pack ],
                            'link'                             => $atts[ 'link_' . $i ],
                            'target'                           => $atts[ 'target_' . $i ],
                            'custom_size'                      => $atts[ 'custom_size_' . $i ],
                            'margin'                           => $atts[ 'margin_' . $i ],
                            'background_color'                 => $atts[ 'icon_background_color_' . $i ],
                            'color'                            => $atts[ 'icon_color_' . $i ],
                            'hover_background_color'           => $atts[ 'icon_hover_background_color_' . $i ],
                            'hover_color'                      => $atts[ 'icon_hover_color_' . $i ],
                            'icon_layout'                      => $atts[ 'icon_layout' ]
                        );

                        $params = $this -> generate_string_params ( $params );

                        echo do_shortcode ( "[reina_core_icon $params]" ); // XSS OK
                    }
                } ?>
            </div>
        <?php }
    }
}

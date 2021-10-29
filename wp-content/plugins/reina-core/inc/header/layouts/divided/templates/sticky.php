<div class="qodef-header-sticky qodef-custom-header-layout <?php echo implode( ' ', apply_filters( 'reina_core_filter_sticky_header_class', array() ) ); ?>">
    <div class="qodef-header-sticky-inner">
	    <div class="qodef-divided-header-left-wrapper">
		    <?php
		    // Include widget area two
		    reina_core_get_header_widget_area( 'sticky', 'two' );
		
		    // Include divided left navigation
		    reina_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' ); ?>
	    </div>
	    <?php
	    // Include logo
	    reina_core_get_header_logo_image( array( 'sticky_logo' => true ) );
	    ?>
	    <div class="qodef-divided-header-right-wrapper">
		    <?php
		    // Include divided right navigation
		    reina_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );
		
		    // Include widget area one
		    reina_core_get_header_widget_area( 'sticky' ); ?>
	    </div>
	    <?php do_action('reina_core_action_after_sticky_header'); ?>
    </div>
</div>

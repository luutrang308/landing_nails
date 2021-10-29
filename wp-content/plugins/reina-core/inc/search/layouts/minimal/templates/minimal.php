<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-search-minimal-form" method="get">
	<div class="qodef-m-inner">
		<input type="text" placeholder="<?php esc_attr_e( 'Type here...', 'reina-core' ); ?>" name="s" class="qodef-m-form-field" autocomplete="off" required/>
		<?php reina_core_get_opener_icon_html( array(
			'option_name'  => 'search',
			'custom_icon'  => 'search',
			'custom_class' => 'qodef-m-close'
		), false, true ); ?>
	</div>
</form>

<div class="qodef-m-icons">
	<?php if ( ! empty( $link1 ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link1 ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo qode_framework_icons()->get_shortcode_icon_fields_value( 'main_icon1', $params ); ?>
		</a>
	<?php endif; ?>
	
	<?php if ( ! empty( $link2 ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link2 ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo qode_framework_icons()->get_shortcode_icon_fields_value( 'main_icon2', $params ); ?>
		</a>
	<?php endif; ?>
	
	<?php if ( ! empty( $link3 ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link3 ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo qode_framework_icons()->get_shortcode_icon_fields_value( 'main_icon3', $params ); ?>
		</a>
	<?php endif; ?>
	
	<?php if ( ! empty( $link4 ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link4); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo qode_framework_icons()->get_shortcode_icon_fields_value( 'main_icon4', $params ); ?>
		</a>
	<?php endif; ?>
	
	<?php if ( ! empty( $link5 ) ) : ?>
		<a itemprop="url" href="<?php echo esc_url( $link5); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo qode_framework_icons()->get_shortcode_icon_fields_value( 'main_icon5', $params ); ?>
		</a>
	<?php endif; ?>
</div>

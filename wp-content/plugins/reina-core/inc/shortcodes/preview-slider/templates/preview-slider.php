<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php echo qode_framework_get_inline_attrs($slider_data); ?>>
	<div class="qodef-ps-images-holder">
		<div class="qodef-ps-images-holder-inner">

			<div class="qodef-ps-mobile-wrapper" <?php qode_framework_inline_style( $mobile_holder_styles ); ?>>
				<div class="qodef-ps-mobile-holder">
					<img src="<?php echo REINA_CORE_SHORTCODES_URL_PATH .'/preview-slider/assets/img/phone.png' ?>" class="qodef-ps-phone-frame"  alt="<?php esc_attr_e('phone','reina-core');?>"/>
					<div class="qodef-ps-mobile-slider">
						<div class="qodef-ps-mobile-images  qodef-preview-slider-element <?php echo esc_html( $slider_classes ); ?>">
							<?php foreach ( $items as $image_item ): ?>
								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									<a href="<?php echo esc_url($image_item['ps_link']); ?>" target="<?php echo esc_attr($image_item['ps_target']); ?>">
								<?php } ?>
								<?php if ( ! empty( $image_item['ps_mobile_image'] ) ) { ?>
									<?php echo wp_get_attachment_image( $image_item['ps_mobile_image'], 'full' ); ?>
								<?php } ?>

								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									</a>
								<?php } ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="qodef-ps-laptop-wrapper" <?php qode_framework_inline_style( $laptop_holder_styles ); ?>>
				<div class="qodef-ps-laptop-holder">
					<img src="<?php echo REINA_CORE_SHORTCODES_URL_PATH .'/preview-slider/assets/img/laptop.png' ?>" class="qodef-ps-laptop-frame" alt="<?php esc_attr_e('laptop','reina-core');?>"/>
					<div class="qodef-ps-laptop-slider">
						<div class="qodef-ps-laptop-images  qodef-preview-slider-element">
							<?php foreach ( $items as $image_item ): ?>
								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									<a href="<?php echo esc_url($image_item['ps_link']); ?>" target="<?php echo esc_attr($image_item['ps_target']); ?>">
								<?php } ?>
								<?php if ( ! empty( $image_item['ps_laptop_image'] ) ) { ?>
									<?php echo wp_get_attachment_image( $image_item['ps_laptop_image'], 'full' ); ?>
								<?php } ?>

								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									</a>
								<?php } ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="qodef-ps-tablet-wrapper" <?php qode_framework_inline_style( $tablet_holder_styles ); ?>>
				<div class="qodef-ps-tablet-holder">
					<img src="<?php echo REINA_CORE_SHORTCODES_URL_PATH .'/preview-slider/assets/img/tablet.png' ?>" class="qodef-ps-tablet-frame"  alt="<?php esc_attr_e('tablet','reina-core');?>"/>
					<div class="qodef-ps-tablet-slider">
						<div class="qodef-ps-tablet-images qodef-preview-slider-element <?php echo esc_html( $slider_classes ); ?>">
							<?php foreach ( $items as $image_item ): ?>
								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									<a href="<?php echo esc_url($image_item['ps_link']); ?>" target="<?php echo esc_attr($image_item['ps_target']); ?>">
								<?php } ?>
								<?php if ( ! empty( $image_item['ps_tablet_image'] ) ) { ?>
									<?php echo wp_get_attachment_image( $image_item['ps_tablet_image'], 'full' ); ?>
								<?php } ?>

								<?php if ( ! empty( $image_item['ps_link'] ) ) { ?>
									</a>
								<?php } ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

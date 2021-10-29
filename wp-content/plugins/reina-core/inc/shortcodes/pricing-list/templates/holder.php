<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-items">
		<?php foreach ( $items as $item ) { ?>
			<div class="qodef-m-item qodef-e">
				<?php reina_core_template_part( 'shortcodes/pricing-list', 'templates/parts/image', '', $item ); ?>
				<?php if ( ! empty( $item ['svg_icon'] ) ) { ?>
					<div class="qodef-e-svg" <?php qode_framework_inline_style( $this_shortcode->get_svg_styles( $item ) );?>>
						<?php reina_core_template_part( 'shortcodes/pricing-list', 'templates/parts/svg', '', $item ); ?>
					</div>
				<?php } ?>
				<div class="qodef-e-content">
					<div class="qodef-e-heading">
						<?php reina_core_template_part( 'shortcodes/pricing-list', 'templates/parts/title', '', $item ) ?>
						<?php reina_core_template_part( 'shortcodes/pricing-list', 'templates/parts/price', '', $item ) ?>
					</div>
					<?php reina_core_template_part( 'shortcodes/pricing-list', 'templates/parts/text', '', $item ) ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

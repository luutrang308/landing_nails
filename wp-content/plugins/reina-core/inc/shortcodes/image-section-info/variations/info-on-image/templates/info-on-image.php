<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-inner clear">
		<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/image', '', $params ); ?>
		<div class="qodef-m-content" <?php echo qode_framework_inline_style( $info_background_styles ); ?>>
			<div class="qodef-m-heading">
				<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/subtitle', '', $params ) ?>
				<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/title', '', $params ) ?>
			</div>
			<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/text', '', $params ) ?>
			<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/button', '', $params ) ?>
			<?php reina_core_template_part( 'shortcodes/image-section-info', 'templates/parts/svg', '', $params ) ?>
		</div>
	</div>
</div>
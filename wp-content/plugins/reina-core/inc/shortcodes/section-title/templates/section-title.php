<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-m-heading">
		<?php reina_core_template_part( 'shortcodes/section-title', 'templates/parts/subtitle', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/section-title', 'templates/parts/title', '', $params ) ?>
	</div>
	<?php reina_core_template_part( 'shortcodes/section-title', 'templates/parts/text', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/section-title', 'templates/parts/button', '', $params ) ?>
</div>
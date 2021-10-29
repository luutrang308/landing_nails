<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/image', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/svg', '', $params ) ?>
	<div class="qodef-m-content">
		<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/tagline', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/title', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/text', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/image-with-text', 'templates/parts/button', '', $params ) ?>
	</div>
</div>

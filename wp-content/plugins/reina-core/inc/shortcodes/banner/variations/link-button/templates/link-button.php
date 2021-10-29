<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/image', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/svg', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/link', '', $params ) ?>
	<div class="qodef-m-content">
		<div class="qodef-m-content-inner" <?php qode_framework_inline_style( $content_styles ); ?>>
			<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/title', '', $params ) ?>
			<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/text', '', $params ) ?>
			<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/button', '', $params ) ?>
		</div>
	</div>
</div>
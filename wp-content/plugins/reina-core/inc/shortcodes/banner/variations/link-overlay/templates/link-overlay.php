<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/image', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/svg', '', $params ) ?>
	<div class="qodef-m-content">
		<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/mark', '', $params ) ?>
		<div class="qodef-m-content-inner">
			<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/title', '', $params ) ?>
			<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/text', '', $params ) ?>
		</div>
	</div>
	<?php reina_core_template_part( 'shortcodes/banner', 'templates/parts/link', '', $params ) ?>
</div>
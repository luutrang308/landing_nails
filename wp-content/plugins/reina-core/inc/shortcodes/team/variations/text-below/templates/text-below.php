<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php reina_core_template_part( 'shortcodes/team', 'templates/parts/image', '', $params ) ?>
	<?php reina_core_template_part( 'shortcodes/team', 'templates/parts/svg', '', $params ) ?>
	<div class="qodef-m-content">
		<?php reina_core_template_part( 'shortcodes/team', 'templates/parts/title', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/team', 'templates/parts/text', '', $params ) ?>
		<?php reina_core_template_part( 'shortcodes/team', 'templates/parts/icons', '', $params ) ?>
	</div>
</div>
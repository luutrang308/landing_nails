<button type="submit" <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?> <?php qode_framework_inline_style( $styles ); ?>>
	<span class="qodef-m-text"><?php echo esc_html( $text ); ?></span>
	<span class="qodef-m-background" <?php qode_framework_inline_style( $hover_background_styles ); ?>></span>
</button>
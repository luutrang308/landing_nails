<?php
$text = get_post_meta( get_the_ID(), 'qodef_testimonials_text', true );
if( ! empty ( $text ) ) { ?>
	<span itemprop="description" class="qodef-e-text">
		<?php echo esc_html( $text ); ?>
	</span>
<?php }
<?php
$quote_meta = get_post_meta( get_the_ID(), 'qodef_post_format_quote_text', true );
$quote_text = ! empty( $quote_meta ) ? $quote_meta : get_the_title();

if ( ! empty( $quote_text ) ) {
	$quote_author     = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author', true );
	$title_tag        = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h5';
	$author_title_tag = isset( $author_title_tag ) && ! empty( $author_title_tag ) ? $author_title_tag : 'span';
	?>
	<div class="qodef-e-quote qodef--draw-svg">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 172.5 118.7" xml:space="preserve"><path d="M169,0.1c-0.9,5.1-2.1,10.1-3.6,15C155.3,1,136.5,1.6,132.2,1.8C126.1,2.3,110,9.8,110,27.1c0,17.3,15.4,20.7,20.9,20.8c5.8,0.1,11.2-1.4,16.1-4.6c3.4-2.2,6.6-5.3,9.4-9.3c3.5-4.9,6.5-11.2,8.9-18.9c4.3,6,7.1,14.6,6.5,27c-1.6,34.1-23.1,48.3-34.8,55.5c-1.3,0.8-3.8,1.9-7,3.2c-12.5,5.1-35,13.3-32,16.1c5.9,5.3,22.7-7.1,26.9-11.3c1.3-1.3,3.1-2.9,5-4.8c8.6-8.2,21.4-21.6,22.7-41.7c0.2-3.6-0.1-6.4-0.7-8.5c4.1-3.8,6.1-8.8,5.7-13.6c-0.1-0.7-0.4-1.9-1.2-3c-1.1-1.6-2.8-3.1-5.5-3.1c-4.5,0-6.8,4.2-6.8,6.8c0,2.6,1.2,4,2.8,5.6c1.7,1.7,3.8,3.6,4.9,7.3c-3.8,3.6-9.5,6.2-16.8,6.6c-16,1-24.7-12.3-39.8-16.2c-2.9-0.8-6-1.2-9.4-1.1c-1.5,0-2.9,0.2-4.3,0.4c0.2,1.3,0.2,2.7-0.2,4c-0.9,3.1-2.9,5.7-5.6,7.8c0.5,1.9,0.7,4.2,0.3,7c-3,19.4-24.1,38.2-34.2,39.5c-5.2,0.7-4,8.7,1.2,8c10.8-1.4,52.1-22.9,52.1-64.5c0-0.4,0-0.7,0-1.1C94.8,0.5,61.8,1.4,55.7,1.8c-6.1,0.4-22.2,7.9-22.2,25.2c0,17.3,15.4,20.5,20.9,20.8c7,0.4,11.5-1.6,16-3.7c-1.2-1.2-2.1-2.4-2.4-3.9c-0.8-3.4,2-6.5,6.1-6.6c4.2-0.1,7,3,7.6,6.6c-4.5,0.7-7.9,2.3-11.3,3.9c1.9,2,4.4,4.1,5.5,7.9c-5,4-12.6,6.4-20.6,8C36.3,64,0.1,57.9,0.1,57.9"/></svg>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-quote-text"><?php echo esc_html( $quote_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<?php if ( ! empty( $quote_author ) ) { ?>
			<<?php echo esc_attr( $author_title_tag ); ?> class="qodef-e-quote-author"><?php echo esc_html( $quote_author ); ?></<?php echo esc_attr( $author_title_tag ); ?>>
		<?php } ?>
		<?php if ( ! is_single() ) { ?>
			<a itemprop="url" class="qodef-e-quote-url" href="<?php the_permalink(); ?>"></a>
		<?php } ?>
	</div>
<?php } ?>
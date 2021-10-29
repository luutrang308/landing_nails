<?php
$link_url_meta  = get_post_meta( get_the_ID(), 'qodef_post_format_link', true );
$link_url       = ! empty( $link_url_meta ) ? $link_url_meta : get_the_permalink();
$link_text_meta = get_post_meta( get_the_ID(), 'qodef_post_format_link_text', true );

if ( ! empty( $link_url ) ) {
	$link_text = ! empty( $link_text_meta ) ? $link_text_meta : get_the_title();
	$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h5';
	?>
	<div class="qodef-e-link qodef--draw-svg">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 171.9 149.8" xml:space="preserve"><path d="M0.1,76.1c15.5,3.5,35.2,1.1,35.2,1.1c1.7,0.1,2.5,2.1,1.4,3.3c-4.2,4.6-12,14.2-19,29.2c-4.2,9-2.4,22.4,5.7,31.2c9.4,10.3,29.3,10.7,40.5,3.7c8.7-5.4,31.1-29.9,40.6-40.3c1.1-1.2-0.1-3.2-1.7-2.7c-2.3,0.6-4.8,1.2-6.9,1.1c-5.3-0.1-10.6-1.8-10.6-1.8l-24.9,25.6c-1.1,1.1-2.2,2-3.5,2.8c-4,2.5-12.5,6.6-18.9,1.2c-0.2-0.2-0.4-0.4-0.6-0.6c-5.8-5.3-6.4-14.2-1.7-20.5c5.3-6.9,15.9-20.7,22.7-27.4c9.3-9.2,18.5-14.6,25.5-13.7c3.5,0.4,8.3,5.9,8.7,8.3v0c1.1,3.2,4.6,5,7.9,3.9c3.3-1.1,7-2.7,8.3-4.9c1.7-2.8,0.7-7-3.7-12c-4.9-5.6-11.8-9.1-19.1-10.4c-6-1-12.1-1.1-17.1,0.9c-7.8,3.1,1.5-7.5,1.5-7.5s20.4-27.6,49.1-42.9c9-4.8,24.4-4.6,32.5,2.7c8.2,7.3,12.8,22.4,7,35.8c-5.8,13.4-21.1,33.8-35.6,44c-6.7,4.8-9.9,7.1-13.3,8.5c-4.4,1.9-14.1,6-24.9,3c-8.1-2.3-16.9-9.4-18.4-16.8c-0.6-3.1,9.7-10.4,14.8-9.9c7.1,0.7,7,9.4,9.9,11.3c4.7,3.2,12.2,0.1,15.7-2.3c3.6-2.4,24.7-25,30.7-34.5c6-9.6,7.2-20.1,0.1-24c-7-3.9-13-3.5-20.1,1.6c-7.1,5.1-15.6,12.7-24.1,22.2c-4.6,5.1-4.5,5.5-4.5,5.5s-8.3-2.3-16.9-0.8c-8.6,1.6-32,23-32,23s4,3.8,13-2.4c6.8-4.7,8.5-7.4,14.3-10.7c7.3-4,16.6-4.3,23.7-1.5c7.8,3,11.9,9.4,14.1,12.9c8,12.8,3.6,21.7,8.1,28.2c4.5,6.4,18,10.5,58.2-1.2"/></svg>
		<<?php echo esc_attr( $title_tag ); ?> class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
		<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $link_url ); ?>" target="_blank"></a>
	</div>
<?php } ?>
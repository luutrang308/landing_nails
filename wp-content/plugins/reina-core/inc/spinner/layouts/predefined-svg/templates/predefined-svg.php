<?php
$spinner_text = esc_html__( 'Loading', 'reina-core' );

if ( ! function_exists( 'reina_str_split_unicode_spinner' ) ) {
	function reina_str_split_unicode_spinner( $str ) {
		return preg_split( '~~u', html_entity_decode( $str ), - 1, PREG_SPLIT_NO_EMPTY );
	}
}

if ( ! function_exists( 'reina_get_split_text_spinner' ) ) {
	function reina_get_split_text_spinner( $text ) {
		if ( ! empty( $text ) ) {
			$split_text = reina_str_split_unicode_spinner( $text );

			foreach ( $split_text as $key => $value ) {
				$split_text[ $key ] = '<span class="qodef-e-character">' . $value . '</span>';
			}

			return implode( ' ', $split_text );
		}

		return $text;
	}
}

$split_spinner_text = reina_get_split_text_spinner( $spinner_text );

?>


<div class="qodef-m-predefined">
	<svg x="0px" y="0px" width="89.3px" height="65.5px" viewBox="0 0 89.3 65.5" style="enable-background:new 0 0 89.3 65.5;" xml:space="preserve">
		<mask id="qodefmask1">
			<g>
				<path d="M1.2,38.3c0,0,8.5,11,17.7,15.6c8.5,4.3,17.9,0.5,17.9,0.5s-4.9,2.5-16.1-2.3C12.1,48.5,5.5,39.6,5.5,39.6  s10.4-4,19.6-2.4C37.1,39.3,39.9,44,39.9,44s-5.9-8.2-15.3-9.3C14.3,33.7,1.2,38.3,1.2,38.3z"/>
				<path d="M5.9,49.5c8.6,9.1,22.7,15.1,38.6,15.1c15.9,0,29.9-5.9,38.6-15.1c-9.2,7.3-23.1,12-38.6,12  C29,61.5,15.2,56.8,5.9,49.5z"/>
			</g>
		</mask>
		<mask id="qodefmask2">
			<g>
				<path d="M14.1,13.7c0,0-0.2,15.5,4.6,25.7C23.1,49,33.9,52,33.9,52s-6-1.1-12.5-12.9c-5-9-4.5-21.4-4.5-21.4  s11.8,3.6,18.8,11.2c9.1,10,8.2,16,8.2,16s0.6-11.2-6.9-18.5C28.8,18.5,14.1,13.7,14.1,13.7z"/>
			</g>
		</mask>
		<mask id="qodefmask3">
			<g>
				<path d="M44.7,0.7c0,0,10.1,13.9,12.4,26.3c2.1,11.5-5.7,21.3-5.7,21.3s4.7-4.9,2.9-19.8C53,17.1,44.7,6.2,44.7,6.2  S36.3,17.1,35,28.5c-1.8,14.9,2.9,19.8,2.9,19.8s-7.8-9.8-5.7-21.3C34.5,14.6,44.7,0.7,44.7,0.7z"/>
			</g>
		</mask>
		<mask id="qodefmask4">
			<g>
				<path d="M75.3,13.7c0,0,0.2,15.5-4.6,25.7C66.2,49,55.4,52,55.4,52s6-1.1,12.5-12.9c5-9,4.5-21.4,4.5-21.4  s-11.8,3.6-18.8,11.2c-9.1,10-8.2,16-8.2,16s-0.6-11.2,6.9-18.5C60.6,18.5,75.3,13.7,75.3,13.7z"/>
			</g>
		</mask>
		<mask id="qodefmask5">
			<g>
				<path d="M88.2,38.3c0,0-8.5,11-17.7,15.6c-8.5,4.3-17.9,0.5-17.9,0.5s4.9,2.5,16.1-2.3c8.6-3.6,15.2-12.6,15.2-12.6  s-10.4-4-19.6-2.4C52.2,39.3,49.5,44,49.5,44s5.9-8.2,15.3-9.3C75,33.7,88.2,38.3,88.2,38.3z"/>
			</g>
		</mask>
		<g class='qodef-shape' mask="url(#qodefmask1)">
			<path class="qodef-path-1" d="M36.8,54.5c0,0-6.7,2.7-15.7-0.8C12.1,50.1,3.4,39,3.4,39s9.7-3.1,17.6-3.3c8.8-0.2,15.2,4.9,19.2,8.5"/>
			<path class="qodef-path-6" d="M5.9,49.5c0,0,16.9,14.4,38.6,14s38.2-13.8,38.2-13.8"/>
		</g>
		<g class='qodef-shape' mask="url(#qodefmask2)">
			<path class="qodef-path-2" d="M33.4,51.9c0,0-10.9-4.9-14.5-15c-3.7-10.3-3.4-21.4-3.4-21.4s9.6,3.8,16.4,8.4s11.9,13.4,12,20.5"/>
		</g>
		<g class='qodef-shape' mask="url(#qodefmask3)">
			<path class="qodef-path-3" d="M37.3,47.4c0,0-6.1-11.1-3.2-21.8C37.4,13,44.7,3.4,44.7,3.4s6.9,10.3,9.6,18.4c2.6,8,2.5,18-2.4,26.4"/>
		</g>
		<g class='qodef-shape' mask="url(#qodefmask4)">
			<path class="qodef-path-4" d="M45.5,44.3c0.1-7.1,5.2-15.9,12-20.5s16.4-8.4,16.4-8.4s0.3,11.1-3.4,21.4c-3.6,10.1-14.5,15-14.5,15" />
		</g>
		<g class='qodef-shape' mask="url(#qodefmask5)">
			<path class="qodef-path-5" d="M49.1,44.2c4-3.6,10.4-8.7,19.2-8.5c7.9,0.2,17.6,3.3,17.6,3.3s-8.7,11.1-17.7,14.7c-9,3.5-15.7,0.8-15.7,0.8"/>
		</g>
	</svg>
</div>

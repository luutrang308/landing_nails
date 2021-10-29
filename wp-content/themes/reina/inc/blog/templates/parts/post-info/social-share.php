<div class="qodef-e-info-item qodef-e-info-social-share">
    <?php
    if ( class_exists( 'ReinaCoreSocialShareShortcode' ) ) {
	    $params = array (
		    'title'  => '',
		    'layout' => 'list' ,
	    );

	    echo ReinaCoreSocialShareShortcode ::call_shortcode ( $params );
    }
    ?>
</div>

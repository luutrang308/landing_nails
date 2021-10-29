<?php if ( has_post_thumbnail() ) : ?>
	<?php if ( isset( $featured_image_parallax ) && 'yes' === $featured_image_parallax ): ?>
        <div class="qodef-parallax-img-holder">
            <div class="qodef-parallax-img-wrapper">
				<?php the_post_thumbnail( 'full', array ( 'class' => 'qodef-parallax-img' ) ); ?>
            </div>
        </div>
	<?php endif; ?>
<?php endif; ?>
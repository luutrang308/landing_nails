<article <?php post_class ( 'qodef-blog-item qodef-e qodef-blog-item--compact' ); ?>>
    <div class="qodef-e-inner">
        <div class="qodef-e-content">
            <div class="qodef-e-text">
                <?php
                // Include post content
                the_content ();

                // Hook to include additional content after blog single content
                do_action ( 'reina_action_after_blog_single_content' );
                ?>
            </div>
            <div class="qodef-e-info qodef-info--bottom">
                <div class="qodef-e-info-left">
                    <?php
                    // Include post category info
                    reina_template_part ( 'blog' , 'templates/parts/post-info/category' );
                    // Include post tags info
                    reina_template_part ( 'blog' , 'templates/parts/post-info/tags' );
                    ?>
                </div>
                <div class="qodef-e-info-right">
                    <?php
                    // Include post social share
                    reina_core_template_part ( 'blog' , 'templates/single/post-info/social-share' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</article>

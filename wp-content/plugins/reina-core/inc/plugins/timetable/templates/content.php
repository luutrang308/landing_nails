<?php
get_header();

// Hook to include additional content before page content holder
do_action( 'reina_core_action_before_event_content_holder' );
?>
    <main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( reina_core_get_grid_gutter_classes() ); ?>">
        <div class="qodef-grid-inner clear">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="qodef-event qodef-grid-item <?php echo esc_attr( reina_get_page_content_sidebar_classes() ); ?>">
                    <div class="qodef-media-holder">
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="qodef-media-image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php reina_core_template_part( 'plugins/timetable', 'templates/parts/title' ); ?>
                    <div class="qodef-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php
                // Include page content sidebar
                reina_core_theme_template_part( 'sidebar', 'templates/sidebar' );
            ?>
        </div>
    </main>
<?php
// Hook to include additional content after main page content holder
do_action( 'reina_core_action_after_event_content_holder' );

get_footer();

        <?php get_template_part( 'partials/footer', 'html' ); ?>

        <?php wp_footer(); ?>

        <?php if( get_field('body_scripts_bottom', 'option') ) : ?>
            <!-- Theme Settings: Body (bottom) Tracking Scripts -->
            <?php echo get_field('body_scripts_bottom', 'option'); // Trusted admin input - raw echo required for script tags ?>
        <?php endif; ?>
    </body>
</html>
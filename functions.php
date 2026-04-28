<?php

    // Register Custom Post Types
    // include_once get_stylesheet_directory() .'/partials/post-type-_____.php';

    // Register Custom Gutenberg/ACF Blocks
    // register_block_type( dirname(__FILE__) . '/blocks/______/block.json');

    // Register Menus
    function register_theme_menus(){
        register_nav_menus(
            array(
                'main-menu' => __('Main Menu'),
                'footer-menu' => __('Footer Menu')
            )
        );
    }
    add_action('init', 'register_theme_menus');

    // Register Custom Block Category
    // Groups all boilerplate blocks under one label in the editor
    add_filter( 'block_categories_all', function( $categories ) {
        return array_merge(
            array(
                array(
                    'slug'  => 'boilerplate-blocks',
                    'title' => 'Boilerplate Blocks',
                    'icon'  => 'superhero',
                ),
            ),
            $categories
        );
    }, 10, 1 );

    // Core Theme Support
    function boilerplate_theme_support() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        ]);
        add_theme_support( 'custom-logo' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'css/editor.css' );
        // Responsive iframe / embed support
        // Handles Loom, YouTube, Vimeo and any oEmbed provider
        add_filter( 'embed_oembed_html', function( $html ) {
            return '<div class="embed-responsive">' . $html . '</div>';
        });
    }
    add_action( 'after_setup_theme', 'boilerplate_theme_support' );

    // Flush rewrite rules once on theme activation
    // Ensures Campaign CPT URLs work immediately after activation
    add_action('after_switch_theme', function() {
        flush_rewrite_rules();
    });

    // Include Common Features
    include_once get_stylesheet_directory() .'/~common_features/ada_responsive_nav/functions.php';
    include_once get_stylesheet_directory() .'/~common_features/landing_pages/functions.php';   


    // Auto-Register All ACF Powered Blocks
    $blocks_dir = __DIR__ . '/~wp_blocks/';
    foreach (glob($blocks_dir . '*/block.json', GLOB_NOSORT) as $block_file) {
        register_block_type($block_file);
    }

    
    // Register StyleSheets and JavaScripts
    if(!is_admin()){
        function theme_stylesheets_js() {

            // Main Stylesheet
            wp_enqueue_style( 'site-core-css', get_stylesheet_uri(), array(), null, 'all' );
            wp_enqueue_style( 'ada-nav-css', get_template_directory_uri() . '/~common_features/ada_responsive_nav/style.css', array( 'site-core-css' ), null, 'all' );
            // wp_enqueue_style( 'lity-core-css', get_template_directory_uri() . '/~js_plugins/lity/lity.min.css', array(), null, 'all' );
            // wp_enqueue_style( 'lightbox-core-css', get_template_directory_uri() . '/~js_plugins/lightbox/lightbox.min.css', array(), null, 'all' );
            wp_enqueue_style( 'owl-core-css', get_template_directory_uri() . '/~js_plugins/owl-carousel/owl.carousel.css', array(), null, 'all' );

            // FontAwesome - All Include Brands Icons - You must add the site domains to the Kit.
            // wp_enqueue_script('font-awesome-6-duotone', 'https://kit.fontawesome.com/14c61f7089.js', array(), null, array('strategy' => 'defer'));
            // wp_enqueue_script('font-awesome-6-solid-regular', 'https://kit.fontawesome.com/206c50a245.js', array(), null, array('strategy' => 'defer'));
            // wp_enqueue_script('font-awesome-6-light', 'https://kit.fontawesome.com/9c29c75e21.js', array(), null, array('strategy' => 'defer'));
            // wp_enqueue_script('font-awesome-6-regular', 'https://kit.fontawesome.com/b37141e8a1.js', array(), null, array('strategy' => 'defer'));
            wp_enqueue_script('font-awesome-6-solid', 'https://kit.fontawesome.com/0b7a4049ad.js', array(), null, array('strategy' => 'defer'));
            
            // jQuery
            wp_deregister_script('jquery');
            wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery3.js', array(), null, array('strategy' => 'defer'));
            
            // Plugins
            // wp_enqueue_script('lightbox-core-js', get_template_directory_uri() .'/~js_plugins/lightbox/lightbox.min.js' , array('jquery'), null, array('strategy' => 'defer'));
            // wp_enqueue_script('lity-core-js', get_template_directory_uri() .'/~js_plugins/lity/lity.min.js' , array('jquery'), null, array('strategy' => 'defer'));
            wp_enqueue_script('ada-nav-js', get_template_directory_uri() . '/~common_features/ada_responsive_nav/script.js', array('jquery'), null, array('strategy' => 'defer'));
            wp_enqueue_script('owl-core-js', get_template_directory_uri() . '/~js_plugins/owl-carousel/owl.carousel.min.js' , array('jquery'), null, array('strategy' => 'defer'));
            // wp_enqueue_script('fitVids-core-js', get_template_directory_uri() .'/~js_plugins/fitVids/jquery.fitvids.js' , array('jquery'), null, array('strategy' => 'defer'));
            
            // Theme Scripts
            wp_enqueue_script('site-core-js', get_template_directory_uri() . '/js/scripts.js' , array('jquery', 'owl-core-js'), null, array('strategy' => 'defer'));
            
        }
        add_action( 'wp_enqueue_scripts', 'theme_stylesheets_js' );
    }

    // Global Fixes for Wordpress, housed in separate file to reduce clutter.
    include_once get_stylesheet_directory() .'/partials/dashboard_fixes.php';

    // Auto-create Boilerplate Pages on Theme Activation
    function boilerplate_create_starter_pages() {

        // Font Test Page
        $font_test = get_page_by_path('font-test');
        if ( ! $font_test ) {
            wp_insert_post([
                'post_title'    => 'Font Test',
                'post_name'     => 'font-test',
                'post_status'   => 'draft',
                'post_type'     => 'page',
                'post_content'  => '<!-- Font test page — assign template-font-test.php when ready -->',
            ]);
        }

        // Master Boilerplate Page
        $boilerplate = get_page_by_path('master-boilerplate');
        if ( ! $boilerplate ) {
            wp_insert_post([
                'post_title'    => 'Master Boilerplate',
                'post_name'     => 'master-boilerplate',
                'post_status'   => 'draft',
                'post_type'     => 'page',
                'post_content'  => '<!-- Boilerplate style guide page -->',
            ]);
        }

    }
    add_action( 'after_switch_theme', 'boilerplate_create_starter_pages' );

    // Add slug-based body classes for page-scoped CSS targeting
    // Adds page-home on the front page and page-{slug} on all other pages
    // Use these in style.css Section 10 to scope block overrides per page
    add_filter( 'body_class', function( $classes ) {
        if ( is_front_page() ) {
            $classes[] = 'page-home';
        }
        if ( is_page() ) {
            $post = get_queried_object();
            if ( $post && ! empty( $post->post_name ) ) {
                $classes[] = 'page-' . sanitize_html_class( $post->post_name );
            }
        }
        return array_unique( $classes );
    });

    // ACF color picker — token palette swatches
    // Parses --color-* hex values from style.css at runtime so the palette
    // always stays in sync with the project's token system automatically.
    add_action( 'acf/input/admin_footer', function() {
        $css    = file_get_contents( get_stylesheet_directory() . '/style.css' );
        $colors = [];
        preg_match_all( '/--color-[\w-]+\s*:\s*(#[0-9a-fA-F]{3,8})\s*;/', $css, $matches );
        if ( ! empty( $matches[1] ) ) {
            $colors = array_values( array_unique( $matches[1] ) );
        }
        ?>
        <script>
        (function($) {
            if (typeof acf === 'undefined') return;
            acf.add_filter('color_picker_args', function(args, field) {
                args.palettes = <?= json_encode( $colors ); ?>;
                return args;
            });
        })(jQuery);
        </script>
        <?php
    });

?>

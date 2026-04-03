<?php

    /*
    This Document is designed to hold all the generic/global fixes to be applied to functions.php, holding the here to avoid clutter in the functions file.
    */

    // Set Up Post Thumbnails
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
        // set_post_thumbnail_size( 300, 195, true );
    }
    

    // Advanced Custom Fields - Options Page Init
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'    => 'Theme Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    
        // Flush W3TC on ACF Options page save
        function flush_cache_on_options_update() {
            if (function_exists('w3tc_flush_all')) { 
                w3tc_flush_all();
            }
        }
        add_action('acf/options_page/save', 'flush_cache_on_options_update', 20);
    }

    

    // Disable W3TC footer comment for all users
    add_filter( 'w3tc_can_print_comment', '__return_false', 10, 1 );

    // Checks Post Data against X day Window (5 default)
    function is_new_post($days = 5) {
        $days = (int) $days;
        $offset = $days*60*60*24;
        if ( get_post_time() < date('U') - $offset )
            return false; 
        return true;
    }

    // Provide Current URL for SEO canonical Links
    function wp_get_current_url() {
        return home_url( esc_url_raw( $_SERVER['REQUEST_URI'] ) );
    }

    // Remove Admin Bar while viewing Site
    if ( is_super_admin() ) {
        add_filter('show_admin_bar', '__return_false');
    }

    // Hide WordPress Notices for non Admin Users
    if ( !is_super_admin() ) {
        remove_all_actions('admin_notices');
    }

    // Removes Comments from admin menu
    add_action( 'admin_menu', 'my_remove_admin_menus' );
    function my_remove_admin_menus() {
        if(!is_super_admin() ) {
            remove_menu_page( 'tools.php' );
        }
        remove_menu_page( 'edit-comments.php' );
    }

    
    /*
    ==========================================================
    COMMENTS — ON BY DEFAULT
    ==========================================================
    Comments are ENABLED in this boilerplate by default.

    TO DISABLE COMMENTS on a project:
    1. Uncomment the add_action and function below
    2. Save and upload dashboard_fixes.php
    3. Comments will be removed from all posts and pages

    TO RE-ENABLE COMMENTS:
    1. Comment out the add_action and function below
    2. Save and upload dashboard_fixes.php
    3. Comments will return to all posts and pages
    ==========================================================
    */

    // add_action('init', 'remove_comment_support', 100);
    // function remove_comment_support() {
    //     remove_post_type_support( 'post', 'comments' );
    //     remove_post_type_support( 'page', 'comments' );
    // }


    // Removes Comments from admin bar
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

    // Make Admin bar "View Site" button open in a new tab.
    function customize_my_wp_admin_bar( $wp_admin_bar ) {
        //Get a reference to the view-site node to modify.
        $node = $wp_admin_bar->get_node('view-site');
        //Change target
        $node->meta['target'] = '_blank';
        //Update Node.
        $wp_admin_bar->add_node($node);
    }
    add_action( 'admin_bar_menu', 'customize_my_wp_admin_bar', 80 );


    // REMOVE Unwanted Wordpress Includes (primarily from wp_head())
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_generator');
    function my_deregister_scripts(){
        wp_dequeue_script('wp-embed');
    }
    add_action('wp_footer', 'my_deregister_scripts');

    // Removes the "Howdy, username! and leaving only the username.
    function replace_howdy( $wp_admin_bar ) {
        $my_account = $wp_admin_bar->get_node( 'my-account' );
        if ( ! is_object( $my_account ) ) return;
        $greeting = str_replace( 'Howdy,', '', $my_account->title );
        $wp_admin_bar->add_node( 
            array(
                'id' => 'my-account',
                'title' => $greeting,
            ) 
        );
    }
    add_filter( 'admin_bar_menu', 'replace_howdy', 9992 );

?>
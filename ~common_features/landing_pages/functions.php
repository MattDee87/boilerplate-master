<?php 

    /*

    11/2024 - Cameron Bruhns

    This snippet is responsible for allowing the manual rendering of a specific 
    template outside of the normal wordpress sitemap of pages or posts.

    This is useful to allow for 1-off instances where you need a page or layout, 
    but do not want a user editable page. This can also be helpful for dynamic pages
    such as form submission thank you pages, for which this example is set up to serve.

    You'll need to make sure the path to the template file is correct 
    in the locate_template() function.


    */

    // Thanks You Page Template - Outside of Sitemap
    add_action('init', function() {
        $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');

        if( $url_path === 'campaign-success' ){
            // load the file if exists
            $load = locate_template('partials/campaign-success.php', true, true, array(
                'is_success' => true
            ));
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
    });



    /*

    11/2024 - Cameron Bruhns

    This snippet sets up a custom post type to allow for a separate interface 
    to manage page-like Landing Pages within the wordpress dashboard.

    to modify the url structure from yourdomain.com/campaign/_________, change 
    the "campaign" to any other slug. 


    */


    // Custom Post Type for Landing Page Campaigns
    function campaign()
    {
        $labels = array(
            'name'                  => _x('Landing Pages', 'Post type general name', 'landing_page'),
            'singular_name'         => _x('Landing Page', 'Post type singular name', 'landing_page'),
            'menu_name'             => _x('Landing Pages', 'Admin Menu text', 'landing_page'),
            'name_admin_bar'        => _x('Landing Page', 'Add New on Toolbar', 'landing_page'),
            'add_new'               => __('Add New Landing Page', 'landing_page'),
            'add_new_item'          => __('Add New Landing Page', 'landing_page'),
            'new_item'              => __('New Landing Page', 'landing_page'),
            'edit_item'             => __('Edit Landing Page', 'landing_page'),
            'view_item'             => __('View Landing Page', 'landing_page'),
            'all_items'             => __('All Landing Pages', 'landing_page'),
            'search_items'          => __('Search Landing Pages', 'landing_page'),
            'parent_item_colon'     => __('Parent Landing Pages:', 'landing_page'),
            'not_found'             => __('No Landing Pages found.', 'landing_page'),
            'not_found_in_trash'    => __('No Landing Pages found in Trash.', 'landing_page'),
            'featured_image'        => _x('Landing Page Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'landing_page'),
            'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'landing_page'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'landing_page'),
            'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'landing_page'),
            'archives'              => _x('Landing Page archive', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'landing_page'),
            'insert_into_item'      => _x('Insert into Landing Page profile', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'landing_page'),
            'uploaded_to_this_item' => _x('Uploaded to this Landing Page', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'landing_page'),
            'filter_items_list'     => _x('Filter Landing Pages list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'landing_page'),
            'items_list_navigation' => _x('Landing Pages list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'landing_page'),
            'items_list'            => _x('Landing Page list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'landing_page'),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => 'Landing Pages',
            'public'             => true,
            'show_ui'            => true,
            'rewrite'            => array( 
                'slug' => 'campaign' ,
                'with_front' => false,
            ),
            'publicly_queryable' => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 21,
            'menu_icon'          => 'dashicons-megaphone',
            'supports'           => array('title','editor','thumbnail'),
            'show_in_rest'       => true
        );

        register_post_type('campaign', $args);
    }
    add_action('init', 'campaign');

?>
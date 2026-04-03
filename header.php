<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"/>
        
        <?php if(isset($custom_seo)) : ?>
            <?php get_template_part( 'partials/seo_meta','', array('info' => $custom_seo) ); ?>
        <?php else: ?>
            <?php get_template_part( 'partials/seo_meta' ); ?>
        <?php endif; ?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.ico' ); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/img/favicon.ico' ); ?>" type="image/x-icon">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <?php wp_head(); ?>


    <?php if( get_field('head_scripts', 'option') ) : ?>
    <!-- Theme Settings: Head Tracking Scripts -->
            <?php echo get_field('head_scripts', 'option'); // Trusted admin input - raw echo required for script tags ?>
    <?php endif; ?>

    </head>
    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>


    <?php if( get_field('body_scripts_top', 'option') ) : ?>
    <!-- Theme Settings: Body (top) Tracking Scripts -->
            <?php echo get_field('body_scripts_top', 'option'); // Trusted admin input - raw echo required for script tags ?>
    <?php endif; ?>


        <a href="#content" class="main_content" aria-label="Skip to Main Content Link"><i class="fas fa-universal-access" aria-hidden="true"></i> Skip to Main Content</a>
        <?php get_template_part( 'partials/header', 'html' ); ?>
            
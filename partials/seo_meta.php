<?php 
    // Custom Defined Title based on $args passed to the header.php like so:
    /* 
    
    <?php get_header('',array('is_success' => true)); ?> 
    
    and inside header.php

    <?php 
        // Handle any passed arguments to header.php
        if($args){
            $custom_seo = array();
            if($args['is_success']){
                $custom_seo['type'] = "success";
            }
            if($args['canonical_id']){
                $custom_seo['canonical_url'] = $args['canonical_id'];
            }
        }
    ?>

    */

    if(isset($args)){
        // if(isset($args['info']['type'])){
        //     $custom_title = ($args['info']['type'] == "success") ? "Submission Successful" : get_the_title();
        // }
        // if(isset($args['info']['canonical_url'])){
        //     $custom_canonical_url = ($args['info']['canonical_url'] !== '') ? get_the_permalink($args['info']['canonical_url']) : esc_url( wp_get_current_url());
        // }
    }
?>


<!-- Meta -->
<?php if(isset($custom_title)) : ?>
    <title><?php echo esc_html($custom_title); ?> | <?php echo esc_html(get_bloginfo('name')); ?></title>
<?php elseif(get_field('meta_title')) : ?>
    <title><?php echo esc_html(get_field('meta_title')); ?></title>
<?php else : ?>

    <?php if(is_home()) : ?>
        <?php $newsPageID = get_option('page_for_posts'); ?>
        <title><?php echo esc_html(get_the_title($newsPageID)); ?> | <?php echo esc_html(get_bloginfo('name')); ?></title>
    <?php elseif(is_singular('post')) : ?>
        <?php $newsPageID = get_option('page_for_posts'); ?>
        <title><?php echo esc_html(get_the_title()); ?> | <?php echo esc_html(get_the_title($newsPageID)); ?> | <?php echo esc_html(get_bloginfo('name')); ?></title>
    <?php else : ?>
        <title><?php echo esc_html(get_the_title()); ?> | <?php echo esc_html(get_bloginfo('name')); ?></title>
    <?php endif; ?>

<?php endif; ?>

<?php if(get_field('meta_description')) :?>
    <meta name="description" content="<?php echo esc_attr(get_field('meta_description')); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_field('meta_description')); ?>" />
<?php endif; ?>

<?php if(get_field('meta_keywords')) :?>
    <meta name="keywords" content="<?php echo esc_attr(get_field('meta_keywords')); ?>">
<?php endif; ?>
    
<!-- Canonical -->
<?php if(isset($custom_canonical_url)) : ?>
    <link rel="canonical" href="<?php echo esc_url($custom_canonical_url); ?>" />
<?php else : ?>
    <link rel="canonical" href="<?php echo esc_url( wp_get_current_url()); ?>" />
<?php endif; ?>

<!-- Opengraph/Twitter -->
<meta name="twitter:card" content="summary" />
<meta property="og:locale" content="en_US" />
<?php if(get_field('meta_title')) : ?>
    <meta property="og:title" content="<?php echo esc_attr(get_field('meta_title')); ?>" />
<?php else : ?>
    <meta property="og:title" content="<?php echo esc_attr(wp_title('', false)); ?>" />
<?php endif; ?>
    <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
<meta property="og:url" content="<?php echo esc_url( wp_get_current_url()); ?>" />
<?php if(is_singular('post')) : ?>
    <meta property="og:type" content="article" />
<?php else : ?>
    <meta property="og:type" content="website" />
<?php endif; ?>

<?php if(is_single()) : ?>
    <?php if ( has_post_thumbnail() ) : ?>
        <?php $og_image = get_the_post_thumbnail_url(); ?>
        <meta property="og:image" content="<?php echo esc_url($og_image); ?>" />
    <?php endif; ?>
<?php endif; ?>


<!-- Schema -->
<?php if(is_singular('post')) : ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "Article",
        "headline": <?php echo wp_json_encode( get_the_title() ); ?>,
        "description": <?php echo wp_json_encode( wp_strip_all_tags( get_the_excerpt() ) ); ?>,
        <?php $content = get_the_content(); $word_count = $content ? str_word_count(strip_tags($content)) : 0; ?>
        "wordCount": "<?php echo esc_html($word_count); ?>",
        "datePublished": "<?php echo get_the_date('Y-m-d'); ?>"
    }
    </script>
<?php endif; ?>

<?php
$business_name = get_bloginfo('name');
$business_url = home_url();
if( $business_name ) :
?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
    "url": "<?php echo esc_url(home_url()); ?>",
    "telephone": "",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "",
        "addressRegion": "",
        "postalCode": "",
        "streetAddress": ""
    }
}
</script>
<?php endif; ?>
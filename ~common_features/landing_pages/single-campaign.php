<?php 
/*

11/2024 - Cameron Bruhns

This template relies on each landing page using an ACF field called `canonical_id` 
which passes the ID of a chosen source canonical page.

The field is part of the `acf-export-landing-page-campaign-acf.json` file in this 
package and would need to be uploaded to AFC and assigned to the proper POST TAYPE.

Additionally, the canonical_id is passed into the header.php - as in below - which 
would then require some setup inside the header.php file to pass the canonical ID 
on to the seo_meta.php file for output.

*/
?>

<?php $canonical_id = get_field('canonical_id'); ?>
<?php get_header('',array('canonical_id' => $canonical_id)); ?>
<?php the_content(); ?>
<?php get_footer(); ?>

<?php get_header(); ?>

<?php
/*
==========================================================
FRONT-PAGE.PHP - HOMEPAGE TEMPLATE
==========================================================

This is the homepage template. It loads when someone
visits the root URL of the site (yourdomain.com).

WHY THIS FILE IS INTENTIONALLY MINIMAL:
The homepage is built entirely using ACF blocks in the
WordPress block editor. This template intentionally gets
out of the way and lets the blocks do the work.

This is the correct approach for a boilerplate because
every client homepage is different. Rather than
hardcoding sections here, you compose the homepage
using your block library:

RECOMMENDED HOMEPAGE BLOCK COMPOSITION:
1. Hero block          — full width banner, heading, CTA
2. CTA Banner block    — conversion nudge section
3. Testimonials block  — social proof grid
4. Page List block     — featured services/pages
5. Video block         — brand or explainer video
6. Contact CTA block   — final call to action

HOW TO BUILD THE HOMEPAGE:
1. Go to WordPress Admin → Pages
2. Find the page set as your homepage
   (Settings → Reading → Your homepage displays)
3. Open it in the block editor
4. Add blocks from the Custom Blocks category
5. Save and preview

NEED A HARDCODED SECTION?
If a specific project needs a PHP-driven homepage
section (e.g. dynamic featured posts, custom query),
add it below between get_header() and get_footer().
Keep it project-specific and comment it clearly.

==========================================================
*/
?>

<main id="content" class="front-page">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
<?php get_header(); ?>

<?php
/*
==========================================================
PAGE.PHP - BASIC PAGE TEMPLATE
==========================================================

This is the default template for displaying WordPress pages.
When someone visits a page, WordPress loads this file.

HOW IT WORKS:
1. get_header() - Loads header.php (navigation, opening HTML tags)
2. the_content() - Displays the page blocks/content
3. get_footer() - Loads footer.php (footer, closing HTML tags)

BLOCKS ARE DISPLAYED HERE:
When you add blocks (Gallery, Accordion, etc.) in WordPress editor,
they are rendered by the_content() function below.

==========================================================
*/
?>

<main id="content" class="page-content">
    <div class="wrapper">
        <div class="page-inner">
            <?php if ( !has_block('acf/custom-hero') ) : ?>
                <h1><?php echo esc_html( get_the_title() ); ?></h1>
            <?php endif; ?>

            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</main>

<?php
/*
==========================================================
ALTERNATIVE PAGE STRUCTURES (EXAMPLES)
==========================================================

If you want a different layout, uncomment one of these options
and comment out the structure above.

OPTION 1: With Hero Image Section
<main id="content" class="page-content">
    <div class="hero-section" style="background-image: url(...);">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="wrapper">
        <article>
            <?php the_content(); ?>
        </article>
    </div>
</main>

OPTION 2: With Sidebar Navigation
<main id="content" class="page-content">
    <div class="wrapper">
        <div class="content-with-sidebar">
            <article class="main-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
            <aside class="sidebar">
                <?php get_template_part('partials/sidebar_nav', 'html'); ?>
            </aside>
        </div>
    </div>
</main>

OPTION 3: Full Width (No Wrapper)
<main id="content" class="page-content">
    <article>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </article>
</main>

==========================================================
*/
?>

<?php get_footer(); ?>
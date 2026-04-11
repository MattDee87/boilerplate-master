<?php
/*
Template Name: Full Width
==========================================================
TEMPLATE-FULL-WIDTH.PHP - FULL WIDTH PAGE TEMPLATE
==========================================================
 
A full width page template with no sidebar and wider
content area. Great for landing style inner pages,
team pages, services pages, or anything that needs
more breathing room than the default page.php.
 
HOW TO USE:
1. Go to WordPress Admin → Pages → Add New or Edit Page
2. In the right panel under Page Attributes → Template
3. Select "Full Width"
4. Save and view the page
 
DIFFERENCE FROM PAGE.PHP:
- No max-width constraint on content
- Wider wrapper
- No article card wrapper — content sits directly on page
- Better for block-heavy pages with full width sections
 
==========================================================
*/
 
get_header(); ?>
 
<main id="content" class="full-width-page">
 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
        <?php if ( get_the_title() && !has_block('acf/custom-hero') ) : ?>
            <div class="full-width-header">
                <div class="wrapper">
                    <h1 class="full-width-title"><?php echo esc_html(get_the_title()); ?></h1>
                </div>
            </div>
        <?php endif; ?>
 
        <!-- Page Content — full width, no wrapper constraint -->
        <!-- Blocks will handle their own widths via alignwide/alignfull -->
        <div class="full-width-content">
            <?php the_content(); ?>
        </div>
 
    <?php endwhile; endif; ?>
 
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     FULL WIDTH TEMPLATE — PAGE-SPECIFIC STYLES
     ============================================================ -->
<style>
 
.full-width-page {
    width: 100%;
}
 
/* Page title header */
.full-width-header {
    padding: var(--space-12) 0 var(--space-8) 0;
    border-bottom: 1px solid var(--color-border);
    margin-bottom: var(--space-10);
}
 
.full-width-title {
    font-size: var(--text-4xl);
    margin: 0;
}
 
/* Full width content area */
/* Blocks manage their own widths */
/* Use .alignwide and .alignfull in blocks for edge to edge sections */
.full-width-content {
    width: 100%;
}
 
/* Default content inside blocks gets standard padding */
.full-width-content .wp-block-group__inner-container,
.full-width-content > p,
.full-width-content > h1,
.full-width-content > h2,
.full-width-content > h3,
.full-width-content > h4,
.full-width-content > h5,
.full-width-content > h6,
.full-width-content > ul,
.full-width-content > ol,
.full-width-content > table {
    max-width: var(--max-width);
    margin-left: auto;
    margin-right: auto;
    padding-left: var(--wrapper-padding);
    padding-right: var(--wrapper-padding);
}
 
/* Responsive */
@media (max-width: 768px) {
    .full-width-title {
        font-size: var(--text-3xl);
    }
 
    .full-width-header {
        padding: var(--space-8) 0 var(--space-6) 0;
    }
}
 
@media (max-width: 480px) {
    .full-width-title {
        font-size: var(--text-2xl);
    }
}
</style>
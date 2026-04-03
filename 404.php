<?php get_header(); ?>
 
<?php
/*
==========================================================
404.PHP - PAGE NOT FOUND TEMPLATE
==========================================================
 
This template loads when WordPress cannot find the
requested page or post.
 
WHAT'S INCLUDED:
- Clear 404 message
- Helpful explanation
- Search form so users can find what they need
- Link back to homepage
- Popular pages list (optional — uses WordPress menus)
 
==========================================================
*/
?>
 
<main id="content" class="page-404">
    <div class="wrapper">
 
        <div class="error-404-container">
 
            <!-- 404 Number -->
            <div class="error-404-number" aria-hidden="true">404</div>
 
            <!-- Message -->
            <div class="error-404-content">
 
                <h1 class="error-404-title">Page Not Found</h1>
 
                <p class="error-404-message">Sorry, the page you were looking for doesn't exist or may have been moved. Let's get you back on track.</p>
 
                <!-- Search Form -->
                <div class="error-404-search">
                    <p class="error-404-search-label">Try searching for what you need:</p>
                    <?php get_search_form(); ?>
                </div>
 
                <!-- Back to Home -->
                <div class="error-404-actions">
                    <a href="<?php echo home_url(); ?>" class="btn">← Back to Home</a>
 
                    <?php
                    // Optional — show main nav links
                    // Useful so users can find their way around
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'menu_class'     => 'error-404-nav',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </div>
 
            </div><!-- /.error-404-content -->
 
        </div><!-- /.error-404-container -->
 
    </div><!-- /.wrapper -->
</main>
 
<?php get_footer(); ?>
 
 
<!-- ============================================================
     404 PAGE — PAGE-SPECIFIC STYLES
     These styles only apply to the 404 page.
     ============================================================ -->
<style>
 
.page-404 {
    padding: var(--space-20) 0;
    min-height: 60vh;
    display: flex;
    align-items: center;
}
 
/* Container */
.error-404-container {
    display: grid;
    grid-template-columns: auto 1fr;
    gap: var(--space-16);
    align-items: center;
    max-width: 900px;
    margin: 0 auto;
}
 
/* Big 404 number */
.error-404-number {
    font-family: var(--font-heading);
    font-size: 180px;
    font-weight: var(--weight-bold);
    line-height: 1;
    color: var(--color-border);
    letter-spacing: -8px;
    user-select: none;
}
 
/* Title */
.error-404-title {
    font-size: var(--text-3xl);
    margin: 0 0 var(--space-4) 0;
    color: var(--color-primary);
}
 
/* Message */
.error-404-message {
    color: var(--color-text-muted);
    font-size: var(--text-md);
    line-height: var(--leading-relaxed);
    margin-bottom: var(--space-8);
    max-width: 500px;
}
 
/* Search */
.error-404-search {
    margin-bottom: var(--space-8);
}
 
.error-404-search-label {
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    color: var(--color-text-muted);
    margin-bottom: var(--space-3);
}
 
/* WordPress search form styles */
.error-404-search .search-form {
    display: flex;
    gap: var(--space-3);
    align-items: center;
}
 
.error-404-search .search-field {
    flex: 1;
    margin-bottom: 0;
    max-width: 400px;
}
 
.error-404-search .search-submit {
    white-space: nowrap;
}
 
/* Actions */
.error-404-actions {
    display: flex;
    align-items: center;
    gap: var(--space-8);
    flex-wrap: wrap;
}
 
/* Nav links */
.error-404-nav {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    list-style: none;
    margin: 0;
    padding: 0;
}
 
.error-404-nav li a {
    font-size: var(--text-sm);
    color: var(--color-text-muted);
    text-decoration: none;
    font-weight: var(--weight-semi);
    transition: color 0.2s ease;
}
 
.error-404-nav li a:hover {
    color: var(--color-accent);
}
 
/* Responsive */
@media (max-width: 768px) {
    .error-404-container {
        grid-template-columns: 1fr;
        gap: var(--space-6);
        text-align: center;
    }
 
    .error-404-number {
        font-size: 120px;
        letter-spacing: -4px;
    }
 
    .error-404-message {
        max-width: 100%;
    }
 
    .error-404-actions {
        justify-content: center;
    }
 
    .error-404-nav {
        justify-content: center;
    }
 
    .error-404-search .search-form {
        flex-direction: column;
        align-items: stretch;
    }
 
    .error-404-search .search-field {
        max-width: 100%;
    }
}
 
@media (max-width: 480px) {
    .error-404-number {
        font-size: 80px;
    }
 
    .error-404-title {
        font-size: var(--text-2xl);
    }
}
</style>
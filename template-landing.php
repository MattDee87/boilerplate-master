<?php
/*
Template Name: Landing Page
==========================================================
TEMPLATE-LANDING.PHP - LANDING PAGE TEMPLATE
==========================================================
 
A distraction-free landing page template with no header
navigation and a minimal footer. Perfect for:
 
- Campaign landing pages
- Lead generation pages
- Product launch pages
- Event registration pages
- Ad campaign destinations
- Email campaign destinations
 
WHY NO HEADER NAV?
Landing pages convert better without navigation.
Removing the nav keeps visitors focused on the
single goal of the page — sign up, buy, register, etc.
 
HOW TO USE:
1. Go to WordPress Admin → Pages → Add New or Edit Page
2. In the right panel under Page Attributes → Template
3. Select "Landing Page"
4. Save and view the page
 
WHAT'S INCLUDED:
- Minimal header — logo only, no navigation
- Full width content area
- Minimal footer — copyright only, no nav
- Trust bar slot (optional — uncomment to use)
 
TO RESTORE HEADER/FOOTER ON A SPECIFIC PROJECT:
Simply assign a different template to the page.
 
==========================================================
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('landing-page-body'); ?>>
<?php wp_body_open(); ?>
 
<a class="main_content" href="#main">Skip to Main Content</a>
 
<!-- ============================================================
     LANDING PAGE HEADER — Logo only, no navigation
     ============================================================ -->
<header class="landing-header">
    <div class="wrapper">
        <div class="landing-header-inner">
 
            <!-- Logo -->
            <div class="landing-logo">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url() ); ?>" class="landing-site-name">
                        <?php echo esc_html( get_bloginfo('name') ); ?>
                    </a>
                <?php endif; ?>
            </div>
 
            <!-- Optional: Phone number or single CTA -->
            <!-- Uncomment and customize for your project -->
            <!--
            <div class="landing-header-cta">
                <a href="tel:+10000000000" class="landing-phone">📞 (000) 000-0000</a>
            </div>
            -->
 
        </div>
    </div>
</header>
 
 
<!-- ============================================================
     LANDING PAGE CONTENT
     ============================================================ -->
<main id="main" class="landing-content">
 
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
        <?php the_content(); ?>
 
    <?php endwhile; endif; ?>
 
</main>
 
 
<!-- ============================================================
     OPTIONAL TRUST BAR
     Uncomment to show trust signals above the footer.
     Great for conversions — logos, stats, guarantees.
     ============================================================ -->
<!--
<section class="landing-trust-bar">
    <div class="wrapper">
        <div class="landing-trust-inner">
            <div class="landing-trust-item">✓ No credit card required</div>
            <div class="landing-trust-item">✓ Cancel anytime</div>
            <div class="landing-trust-item">✓ 30-day money back guarantee</div>
            <div class="landing-trust-item">✓ SSL secured</div>
        </div>
    </div>
</section>
-->
 
 
<!-- ============================================================
     LANDING PAGE FOOTER — Minimal, no navigation
     ============================================================ -->
<footer class="landing-footer">
    <div class="wrapper">
        <div class="landing-footer-inner">
 
            <p class="landing-copyright">
                &copy; <?php echo esc_html( date('Y') ); ?> <?php echo esc_html( get_bloginfo('name') ); ?>. All rights reserved.
            </p>
 
            <!-- Optional privacy/terms links -->
            <!-- Uncomment and add your URLs -->
            <!--
            <nav class="landing-legal-nav">
                <a href="/privacy-policy/">Privacy Policy</a>
                <a href="/terms/">Terms of Service</a>
            </nav>
            -->
 
        </div>
    </div>
</footer>
 
<?php wp_footer(); ?>
 
</body>
</html>
 
 
<!-- ============================================================
     LANDING PAGE — PAGE-SPECIFIC STYLES
     ============================================================ -->
<style>
 
/* Remove default body margin/padding */
.landing-page-body {
    margin: 0;
    padding: 0;
    background: var(--color-bg);
}
 
/* Landing header */
.landing-header {
    background: var(--color-bg);
    border-bottom: 1px solid var(--color-border);
    padding: var(--space-5) 0;
}
 
.landing-header-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
 
/* Logo */
.landing-logo a img {
    max-height: 48px;
    width: auto;
}
 
.landing-site-name {
    font-family: var(--font-heading);
    font-size: var(--text-xl);
    font-weight: var(--weight-bold);
    color: var(--color-primary);
    text-decoration: none;
}
 
.landing-site-name:hover {
    color: var(--color-accent);
    text-decoration: none;
}
 
/* Optional phone CTA in header */
.landing-phone {
    font-size: var(--text-base);
    font-weight: var(--weight-semi);
    color: var(--color-primary);
    text-decoration: none;
}
 
.landing-phone:hover {
    color: var(--color-accent);
}
 
/* Landing content */
.landing-content {
    width: 100%;
    min-height: 60vh;
}
 
/* Trust bar */
.landing-trust-bar {
    background: var(--color-bg-alt);
    border-top: 1px solid var(--color-border);
    border-bottom: 1px solid var(--color-border);
    padding: var(--space-5) 0;
}
 
.landing-trust-inner {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: var(--space-8);
    flex-wrap: wrap;
}
 
.landing-trust-item {
    font-size: var(--text-sm);
    font-weight: var(--weight-semi);
    color: var(--color-text-muted);
}
 
/* Landing footer */
.landing-footer {
    background: var(--color-bg-dark);
    padding: var(--space-6) 0;
    margin-top: var(--space-16);
}
 
.landing-footer-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--space-4);
}
 
.landing-copyright {
    color: rgba(255, 255, 255, 0.55);
    font-size: var(--text-sm);
    margin: 0;
}
 
/* Legal nav */
.landing-legal-nav {
    display: flex;
    gap: var(--space-6);
}
 
.landing-legal-nav a {
    color: rgba(255, 255, 255, 0.55);
    font-size: var(--text-sm);
    text-decoration: none;
    transition: color 0.2s ease;
}
 
.landing-legal-nav a:hover {
    color: var(--color-white);
}
 
/* Responsive */
@media (max-width: 768px) {
    .landing-footer-inner {
        flex-direction: column;
        text-align: center;
    }
 
    .landing-trust-inner {
        gap: var(--space-4);
    }
 
    .landing-trust-item {
        font-size: var(--text-xs);
    }
}
</style>
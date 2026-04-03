<?php
/*
==========================================================
FOOTER-HTML.PHP - FOOTER STRUCTURE PARTIAL
==========================================================

This is a "partial" - a reusable template snippet.

WHY SEPARATED FROM footer.php?
- footer.php handles technical WordPress stuff (wp_footer(), scripts, etc.)
- footer-html.php handles just the visible footer (nav, content, etc.)
- Keeps code organized and maintainable

HOW IT'S USED:
footer.php includes this file with:
<?php get_template_part('partials/footer', 'html'); ?>

This partial displays on EVERY page (Home, About, Contact, etc.)

ACF OPTIONS:
This example uses ACF fields stored in "Theme Settings" (Site Settings page).
If you use contact info in footer, create these ACF fields:
- phone (Text)
- email (Email)
- address_1, address_2, city, state, zip_code (Text)

==========================================================
*/
?>

<footer>
    <div class="wrapper">
        <div class="footer-content">
            
            <!-- Footer Navigation Menu -->
            <nav class="footer-nav">
                <?php
                    // Footer Menu (clients manage in WordPress admin)
                    // Go to: Appearance → Menus
                    
                    wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'menu_class' => '',
                        'items_wrap' => '%3$s',
                        'container' => false,
                        'container_class' => '',
                        'fallback_cb' => false
                    ]);
                ?>
            </nav>

            <!-- Copyright/Credit -->
            <div class="footer-credit">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>

        </div>
    </div>

    <!-- Scroll To Top Button -->
    <div id="top" aria-label="Scroll to top" role="button" tabindex="0">
        <i class="fas fa-chevron-up"></i>
    </div>
</footer>

<?php
/*
==========================================================
FOOTER STRUCTURE EXAMPLES
==========================================================

The above is a BASIC footer with just navigation and copyright.
Here are alternatives you can use per project:

OPTION 1: Logo + Menu + Copyright (Most Common)
<footer>
    <div class="wrapper">
        <a href="/" id="footer-logo">Logo</a>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
</footer>

OPTION 2: With Contact Information (from ACF)
<footer>
    <div class="wrapper">
        <div class="footer-left">
            <a href="/" id="footer-logo">Logo</a>
        </div>
        <div class="footer-center">
            <nav>
                <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
            </nav>
        </div>
        <div class="footer-right">
            <div class="footer-contact">
                <p>
                    <strong>Phone:</strong> 
                    <?php echo get_field('phone', 'option'); ?>
                </p>
                <p>
                    <strong>Email:</strong> 
                    <?php echo get_field('email', 'option'); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
</footer>

OPTION 3: Multi-Column Footer (Common for Large Sites)
<footer>
    <div class="wrapper">
        <div class="footer-columns">
            
            <!-- Column 1: Logo/About -->
            <div class="footer-col">
                <a href="/" id="footer-logo">Logo</a>
                <p>Brief description of company</p>
            </div>
            
            <!-- Column 2: Main Menu -->
            <div class="footer-col">
                <h4>Navigation</h4>
                <nav>
                    <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
                </nav>
            </div>
            
            <!-- Column 3: Contact Info -->
            <div class="footer-col">
                <h4>Contact</h4>
                <p>
                    <?php echo get_field('address_1', 'option'); ?><br>
                    <?php echo get_field('city', 'option'); ?>, 
                    <?php echo get_field('state', 'option'); ?> 
                    <?php echo get_field('zip_code', 'option'); ?>
                </p>
                <p><?php echo get_field('phone', 'option'); ?></p>
            </div>
            
            <!-- Column 4: Social Links -->
            <div class="footer-col">
                <h4>Follow</h4>
                <ul class="social-links">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
</footer>

OPTION 4: Scroll to Top Button + Footer
<footer>
    <div class="wrapper">
        <nav>
            <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
    <button id="scroll-to-top" aria-label="Scroll to Top">
        <i class="fas fa-chevron-up"></i> Back to Top
    </button>
</footer>

HOW TO USE ACF FIELDS IN FOOTER:
1. Go to WordPress Admin → Site Settings
2. Fill in Contact Information fields
3. Uncomment the ACF field lines in footer
4. Use: <?php echo get_field('field_name', 'option'); ?>

The 'option' parameter tells WordPress to get the value from
Site Settings (Theme Options) instead of a page/post.

==========================================================
*/
?>
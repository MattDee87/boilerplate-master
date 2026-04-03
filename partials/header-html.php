<?php
/*
==========================================================
HEADER-HTML.PHP - HEADER STRUCTURE PARTIAL
==========================================================

This is a "partial" - a reusable template snippet.

WHY SEPARATED FROM header.php?
- header.php handles technical WordPress stuff (<head>, scripts, etc.)
- header-html.php handles just the visible header (nav, logo, etc.)
- Keeps code organized and maintainable

HOW IT'S USED:
header.php includes this file with:
<?php get_template_part('partials/header', 'html'); ?>

This partial displays on EVERY page (Home, About, Contact, etc.)

==========================================================
*/
?>

<header>
    <div class="wrapper">
        <div class="header_inner">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url() ); ?>" id="logo" aria-label="Home">
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </a>
            <?php endif; ?>

            <nav>
            <?php
                // Main Navigation Menu
                // This displays the menu that clients manage in WordPress admin
                // Go to: Appearance -> Menus to manage menu items
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'menu_class' => '',
                    'items_wrap' => '%3$s',
                    'container' => false,
                    'container_class' => '',
                    'walker' => new theme_Menu_Walker()
                ]);
            ?>
            </nav>

            <div id="mnavbutton">
                <button class="menu" type="button" aria-label="Main Menu">
                    <svg width="50" height="50" viewBox="0 0 100 100" aria-hidden="true" focusable="false">
                        <path class="line line1"
                            d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                        <path class="line line2" d="M 20,50 H 80" />
                        <path class="line line3"
                            d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<?php
/*
==========================================================
HEADER STRUCTURE EXAMPLES
==========================================================

The above is a BASIC header with just navigation.
Here are alternatives you can use per project:

OPTION 1: Logo + Navigation (Most Common)
<header>
    <div class="wrapper">
        <a href="/" id="logo" aria-label="Home">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
        </a>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
        </nav>
    </div>
</header>

OPTION 2: With Hamburger Menu (Mobile)
<header>
    <div class="wrapper">
        <a href="/" id="logo">Logo</a>
        <div id="mnavbutton">
            <button class="menu" aria-label="Main Menu">☰</button>
        </div>
        <nav>
            <?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
        </nav>
    </div>
</header>

OPTION 3: With Search, Social, Multiple Menus
<header>
    <div class="wrapper">
        <div class="header-left">
            <a href="/" id="logo">Logo</a>
            <nav class="main-nav">
                <?php wp_nav_menu(['theme_location' => 'main-menu']); ?>
            </nav>
        </div>
        <div class="header-right">
            <nav class="utility-nav">
                <?php wp_nav_menu(['theme_location' => 'utility-menu']); ?>
            </nav>
            <button class="search-toggle">Search</button>
        </div>
    </div>
</header>

CHOOSE THE OPTION THAT FITS YOUR PROJECT
Then replace the simple <header> structure at the top with your choice

==========================================================
*/
?>

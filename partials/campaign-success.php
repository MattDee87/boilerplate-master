<?php
/*
==========================================================
CAMPAIGN-SUCCESS.PHP - LANDING PAGE SUCCESS PARTIAL
==========================================================

This partial loads at the URL: /campaign-success

It is triggered by landing_functions.php when someone
visits that URL after submitting a landing page form.

It does NOT need a WordPress page — it loads outside
the normal WordPress page system intentionally.

TO CUSTOMIZE PER PROJECT:
- Update the heading and message below
- Add the client logo if needed
- Update the "Back to Home" link if the homepage
  is not at the root URL

==========================================================
*/

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) exit;

// Get site info
$site_name = get_bloginfo( 'name' );
$home_url  = home_url();
$title     = 'Thank You!';
$message   = 'We received your submission and will be in touch with you shortly.';
$cid       = isset( $_GET['cid'] ) ? sanitize_text_field( wp_unslash( $_GET['cid'] ) ) : '';
$campaign_title = '';

if ( $cid ) {
    $campaign_query = new WP_Query([
        'post_type'      => 'campaign',
        'posts_per_page' => 1,
        'meta_key'       => 'tracking_id',
        'meta_value'     => $cid,
        'no_found_rows'  => true,
    ]);

    if ( $campaign_query->have_posts() ) {
        $campaign_query->the_post();
        $campaign_title = get_the_title();
        $message = sprintf(
            'Thank you for contacting %1$s regarding %2$s. We received your submission and will be in touch with you shortly.',
            $site_name,
            $campaign_title
        );
        wp_reset_postdata();
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | <?php echo esc_html($site_name); ?></title>
    <!-- Noindex — success pages should never be indexed -->
    <meta name="robots" content="noindex, nofollow">
    <style>
    .campaign-success-page {
        margin: 0;
        padding: 0;
        background: var(--color-bg);
    }

    .campaign-success-main {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: var(--space-10);
    }

    .campaign-success-inner {
        text-align: center;
        max-width: 560px;
    }

    .campaign-success-icon {
        font-size: 72px;
        color: var(--color-accent);
        margin-bottom: var(--space-6);
        line-height: 1;
    }

    .campaign-success-title {
        font-size: var(--text-4xl);
        color: var(--color-primary);
        margin: 0 0 var(--space-5) 0;
    }

    .campaign-success-message {
        font-size: var(--text-md);
        color: var(--color-text-muted);
        line-height: var(--leading-relaxed);
        margin-bottom: var(--space-8);
    }

    .campaign-success-btn {
        display: inline-block;
    }

    @media (max-width: 480px) {
        .campaign-success-title {
            font-size: var(--text-2xl);
        }
    }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('campaign-success-page'); ?>>
<?php wp_body_open(); ?>

<main class="campaign-success-main">
    <div class="campaign-success-inner">

        <!-- Success Icon -->
        <div class="campaign-success-icon" aria-hidden="true">
            <i class="fas fa-check-circle"></i>
        </div>

        <!-- Message -->
        <h1 class="campaign-success-title"><?php echo esc_html( $title ); ?></h1>
        <p class="campaign-success-message">
            <?php echo esc_html( $message ); ?>
        </p>

        <!-- Back to Home -->
        <a href="<?php echo esc_url($home_url); ?>" class="btn campaign-success-btn">
            ← Back to Home
        </a>

    </div>
</main>

<?php wp_footer(); ?>

</body>
</html>

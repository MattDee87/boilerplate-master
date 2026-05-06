<?php
    // Get All Fields
    $content          = get_field('content');
    $variant          = get_field('section_variant') ?: 'default';
    $variant_class    = 'special_callout_variant_' . str_replace('-', '_', $variant);

    // Check for Content
    if($content) :

?>
    <section class="special_callout <?= esc_attr($variant_class); ?>">
        <div class="wrapper special_callout_wrapper">
            <div class="special_callout_inner">
                <?php echo wp_kses_post($content); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

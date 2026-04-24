<?php
/*
==========================================================
HERO BLOCK — hero.php
==========================================================
ACF FIELDS REQUIRED:
Create a field group in ACF and assign it to this block.
Field group name suggestion: "Hero Block"
 
Fields needed:
- hero_heading         Text
- hero_subheading      Text
- hero_paragraph       Textarea
- hero_cta_1_label     Text
- hero_cta_1_url       URL
- hero_cta_2_label     Text
- hero_cta_2_url       URL
- hero_alignment       Select → left / center / right
- hero_bg_image        Image (return: array)
- hero_overlay_opacity Number (min: 0, max: 100, default: 40)
- hero_bg_color        Color Picker (fallback if no image)
 
TO SIMPLIFY TO OPTION A (color only, no image):
- Remove the hero_bg_image field from ACF
- Remove the $bg_image and overlay sections in this file
- Remove the background-image CSS from hero.css
 
TO SIMPLIFY TO OPTION B (image, no dual CTA):
- Remove hero_cta_2_label and hero_cta_2_url ACF fields
- Remove the second button block below
==========================================================
*/
 
// Get All Fields
$heading            = get_field('hero_heading');
$subheading         = get_field('hero_subheading');
$paragraph          = get_field('hero_paragraph');
$cta_1_label        = get_field('hero_cta_1_label');
$cta_1_url          = get_field('hero_cta_1_url');
$cta_2_label        = get_field('hero_cta_2_label');
$cta_2_url          = get_field('hero_cta_2_url');
$alignment          = get_field('hero_alignment') ?: 'left';
$bg_image           = get_field('hero_bg_image');
$overlay_opacity    = get_field('hero_overlay_opacity') ?: 40;
$bg_color           = get_field('hero_bg_color') ?: '';
$variant            = get_field('section_variant') ?: 'default';
$variant_class      = 'hero_variant_' . str_replace('-', '_', $variant);
 
// Build inline styles
$bg_styles = '';
if ( $bg_image ) {
    $bg_image_url = is_array($bg_image) ? $bg_image['url'] : $bg_image;
    $bg_styles .= 'background-image: url(' . esc_url( $bg_image_url ) . ');';
} elseif ( $bg_color ) {
    $bg_styles .= 'background-color: ' . esc_attr( $bg_color ) . ';';
}
 
// Convert overlay opacity (0-100) to decimal (0-1)
$overlay_decimal = ($overlay_opacity / 100);
 
// Check for minimum content
if ( $heading ) :
?>
 
<?php $hero_style = get_field('hero_style') ?: 'full-width'; ?>
<div class="hero_block hero_style_<?php echo esc_attr($hero_style); ?> hero_align_<?php echo esc_attr($alignment); ?> <?php echo esc_attr($variant_class); ?>" style="<?php echo $bg_styles; ?>">
 
    <?php if ( $bg_image ) : ?>
        <!-- Dark overlay — opacity controlled by ACF field -->
        <div class="hero_overlay" style="background: rgba(0,0,0,<?php echo $overlay_decimal; ?>);"></div>
    <?php endif; ?>
 
    <div class="hero_inner">
 
        <?php if ( $subheading ) : ?>
            <p class="hero_subheading"><?php echo esc_html($subheading); ?></p>
        <?php endif; ?>
 
        <h1 class="hero_heading"><?php echo esc_html($heading); ?></h1>
 
        <?php if ( $paragraph ) : ?>
            <p class="hero_paragraph"><?php echo esc_html($paragraph); ?></p>
        <?php endif; ?>
 
        <?php if ( $cta_1_label || $cta_2_label ) : ?>
            <div class="hero_cta_row">
 
                <?php if ( $cta_1_label && $cta_1_url ) : ?>
                    <a href="<?php echo esc_url($cta_1_url); ?>" class="btn hero_cta_primary">
                        <?php echo esc_html($cta_1_label); ?>
                    </a>
                <?php endif; ?>
 
                <?php if ( $cta_2_label && $cta_2_url ) : ?>
                    <a href="<?php echo esc_url($cta_2_url); ?>" class="btn btn-outline hero_cta_secondary">
                        <?php echo esc_html($cta_2_label); ?>
                    </a>
                <?php endif; ?>
 
            </div>
        <?php endif; ?>
 
    </div><!-- /.hero_inner -->
 
</div><!-- /.hero_block -->
 
<?php endif; ?>
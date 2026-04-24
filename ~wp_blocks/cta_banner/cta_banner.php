<?php
/*
==========================================================
CTA BANNER BLOCK — cta_banner.php
==========================================================
ACF FIELDS REQUIRED:
Create a field group in ACF and assign it to this block.
Field group name suggestion: "CTA Banner Block"

Fields needed:
- cta_eyebrow            Text (optional small label above heading)
- cta_heading            Text (required)
- cta_subheading         Text (optional)
- cta_btn_1_label        Text
- cta_btn_1_url          URL
- cta_btn_2_label        Text
- cta_btn_2_url          URL
- cta_alignment          Select → left / center (default: center)
- cta_bg_image           Image (return: array)
- cta_overlay_opacity    Number (min: 0, max: 100, default: 60)
- cta_bg_color           Color Picker (fallback if no image)

TO SIMPLIFY TO OPTION A (color background, heading, one button):
- Remove cta_bg_image, cta_overlay_opacity ACF fields
- Remove cta_subheading, cta_eyebrow ACF fields
- Remove cta_btn_2 ACF fields
- Remove overlay div and eyebrow/subheading blocks below

TO SIMPLIFY TO OPTION B (image, heading, subheading, one button):
- Remove cta_btn_2 ACF fields
- Remove the second button block below
- Remove cta_eyebrow ACF field and block below
==========================================================
*/

// Get All Fields
$eyebrow            = get_field('cta_eyebrow');
$heading            = get_field('cta_heading');
$subheading         = get_field('cta_subheading');
$btn_1_label        = get_field('cta_btn_1_label');
$btn_1_url          = get_field('cta_btn_1_url');
$btn_2_label        = get_field('cta_btn_2_label');
$btn_2_url          = get_field('cta_btn_2_url');
$alignment          = get_field('cta_alignment') ?: 'center';
$bg_image           = get_field('cta_bg_image');
$overlay_opacity    = get_field('cta_overlay_opacity') ?: 60;
$bg_color           = get_field('cta_bg_color') ?: '';
$variant            = get_field('section_variant') ?: 'default';
$variant_class      = 'cta_banner_variant_' . str_replace('-', '_', $variant);

// Build inline background styles
$bg_styles = '';
if ( $bg_image ) {
    $bg_styles .= 'background-image: url(' . esc_url( $bg_image['url'] ) . ');';
} elseif ( $bg_color ) {
    $bg_styles .= 'background-color: ' . esc_attr( $bg_color ) . ';';
}

// Convert overlay opacity (0-100) to decimal
$overlay_decimal = ($overlay_opacity / 100);

// Require heading to render
if ( $heading ) :
?>

<?php $cta_style = get_field('cta_style') ?: 'full-width'; ?>
<div class="cta_banner cta_style_<?php echo esc_attr($cta_style); ?> cta_align_<?php echo esc_attr($alignment); ?> <?php echo esc_attr($variant_class); ?>" style="<?php echo $bg_styles; ?>">

    <?php if ( $bg_image ) : ?>
        <!-- Overlay — opacity controlled by ACF field -->
        <div class="cta_overlay" style="background: rgba(0,0,0,<?php echo $overlay_decimal; ?>);"></div>
    <?php endif; ?>

    <div class="cta_inner">

        <!-- Eyebrow -->
        <?php if ( $eyebrow ) : ?>
            <p class="cta_eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>

        <!-- Heading -->
        <h2 class="cta_heading"><?php echo esc_html($heading); ?></h2>

        <!-- Subheading -->
        <?php if ( $subheading ) : ?>
            <p class="cta_subheading"><?php echo esc_html($subheading); ?></p>
        <?php endif; ?>

        <!-- CTA Buttons -->
        <?php if ( $btn_1_label || $btn_2_label ) : ?>
            <div class="cta_btn_row">

                <?php if ( $btn_1_label && $btn_1_url ) : ?>
                    <a href="<?php echo esc_url($btn_1_url); ?>" class="btn cta_btn_primary">
                        <?php echo esc_html($btn_1_label); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $btn_2_label && $btn_2_url ) : ?>
                    <a href="<?php echo esc_url($btn_2_url); ?>" class="btn cta_btn_secondary">
                        <?php echo esc_html($btn_2_label); ?>
                    </a>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </div><!-- /.cta_inner -->

</div><!-- /.cta_banner -->

<?php endif; ?>
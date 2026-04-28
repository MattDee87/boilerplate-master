<?php
/*
==========================================================
SPLIT VIEW BLOCK — split_view.php
==========================================================
ACF FIELDS REQUIRED:
Import acf-split-view-block.json via ACF → Tools → Import.

STRUCTURE:
- Optional header (heading + alignment + flow/island style)
- Rows repeater — each row has two columns
  Each column is independently set to: image / video / text
- Optional CTA buttons at the bottom

MODES:
- Connected — all rows share one background panel
- Separated — each row (and header) has its own background

BACKGROUNDS:
- Connected: sv_bg_color (color picker) or sv_bg_image with overlay
- Separated: per-row row_bg_color / row_bg_image
- Header: sv_header_bg_color / sv_header_bg_image

HOW TO USE:
1. Add the Split View block to any page
2. Enable header if needed, set heading, alignment, and style
3. Add rows via the repeater — pick a type per column
4. Choose Connected or Separated in the Style tab
5. Set background color or image per panel
==========================================================
*/

// Style Tab
$mode          = get_field('sv_mode')      ?: 'connected';
$variant       = get_field('sv_variant')   ?: 'default';
$variant_class = 'sv_variant_' . str_replace('-', '_', $variant);
$header_bg     = get_field('sv_header_bg') ?: 'default';

// Connected background
$sv_bg_color           = get_field('sv_bg_color')           ?: '';
$sv_bg_image           = get_field('sv_bg_image');
$sv_bg_overlay_opacity = get_field('sv_bg_overlay_opacity');
if ( $sv_bg_overlay_opacity === '' || $sv_bg_overlay_opacity === false ) {
    $sv_bg_overlay_opacity = 40;
}
$sv_header_connected_bg_color = get_field('sv_header_connected_bg_color') ?: '';

// Separated header background
$sv_header_bg_color = get_field('sv_header_bg_color') ?: '';
$sv_header_bg_image = get_field('sv_header_bg_image');

// Header
$header_enabled   = get_field('sv_header_enabled');
$header_heading   = get_field('sv_header_heading');
$header_alignment = get_field('sv_header_alignment') ?: 'center';
$header_style     = get_field('sv_header_style')     ?: 'flow';

// Rows
$rows = get_field('sv_rows');

// CTAs
$cta_1_label = get_field('sv_cta_1_label');
$cta_1_url   = get_field('sv_cta_1_url');
$cta_2_label = get_field('sv_cta_2_label');
$cta_2_url   = get_field('sv_cta_2_url');

// Build inline background style helper
function sv_bg_inline_style( $color, $image ) {
    $styles = [];
    if ( is_array( $image ) && ! empty( $image['url'] ) ) {
        $styles[] = 'background-image: url(' . esc_url( $image['url'] ) . ')';
        $styles[] = 'background-size: cover';
        $styles[] = 'background-position: center';
        $styles[] = 'background-repeat: no-repeat';
    } elseif ( $color ) {
        $styles[] = 'background-color: ' . esc_attr( $color );
    }
    return $styles ? ' style="' . implode( '; ', $styles ) . '"' : '';
}

if ( $rows && is_array( $rows ) ) :
?>

<div class="split_view sv_mode_<?= esc_attr( $mode ); ?> <?= esc_attr( $variant_class ); ?>">

    <?php if ( $mode === 'connected' ) : ?>

        <?php
        $panel_bg_attr = sv_bg_inline_style( $sv_bg_color, $sv_bg_image );
        $has_bg_image  = is_array( $sv_bg_image ) && ! empty( $sv_bg_image['url'] );
        $overlay_style = $has_bg_image ? ' style="background-color: rgba(0,0,0,' . ( intval( $sv_bg_overlay_opacity ) / 100 ) . ')"' : '';
        ?>
        <div class="sv_panel"<?= $panel_bg_attr; ?>>
            <?php if ( $has_bg_image && intval( $sv_bg_overlay_opacity ) > 0 ) : ?>
                <div class="sv_overlay"<?= $overlay_style; ?>></div>
            <?php endif; ?>
            <div class="sv_wrapper">

                <?php if ( $header_enabled && $header_heading ) :
                    $header_card_style = $sv_header_connected_bg_color
                        ? ' style="--sv-header-card-bg: ' . esc_attr( $sv_header_connected_bg_color ) . '"'
                        : '';
                ?>
                    <div class="sv_header sv_header_align_<?= esc_attr( $header_alignment ); ?> sv_header_<?= esc_attr( $header_style ); ?>"<?= $header_card_style; ?>>
                        <h2 class="sv_header_heading"><?= esc_html( $header_heading ); ?></h2>
                    </div>
                <?php endif; ?>

                <div class="sv_rows">
                    <?php foreach ( $rows as $row ) :

                        $col_1_type      = isset( $row['col_1_type'] )      ? $row['col_1_type']      : 'text';
                        $col_1_image     = isset( $row['col_1_image'] )     ? $row['col_1_image']     : null;
                        $col_1_video_url = isset( $row['col_1_video_url'] ) ? $row['col_1_video_url'] : '';
                        $col_1_heading   = isset( $row['col_1_heading'] )   ? $row['col_1_heading']   : '';
                        $col_1_body      = isset( $row['col_1_body'] )      ? $row['col_1_body']      : '';

                        $col_2_type      = isset( $row['col_2_type'] )      ? $row['col_2_type']      : 'text';
                        $col_2_image     = isset( $row['col_2_image'] )     ? $row['col_2_image']     : null;
                        $col_2_video_url = isset( $row['col_2_video_url'] ) ? $row['col_2_video_url'] : '';
                        $col_2_heading   = isset( $row['col_2_heading'] )   ? $row['col_2_heading']   : '';
                        $col_2_body      = isset( $row['col_2_body'] )      ? $row['col_2_body']      : '';
                    ?>

                        <div class="sv_row">

                            <div class="sv_col sv_col_type_<?= esc_attr( $col_1_type ); ?>">
                                <?php if ( $col_1_type === 'image' && is_array( $col_1_image ) && $col_1_image['url'] ) : ?>
                                    <img src="<?= esc_url( $col_1_image['url'] ); ?>" alt="<?= esc_attr( $col_1_image['alt'] ); ?>" class="sv_col_img">
                                <?php elseif ( $col_1_type === 'video' && $col_1_video_url ) : ?>
                                    <div class="sv_col_video embed-responsive">
                                        <iframe src="<?= esc_url( $col_1_video_url ); ?>" allowfullscreen></iframe>
                                    </div>
                                <?php elseif ( $col_1_type === 'text' ) : ?>
                                    <?php if ( $col_1_heading ) : ?>
                                        <h3 class="sv_col_heading"><?= esc_html( $col_1_heading ); ?></h3>
                                    <?php endif; ?>
                                    <?php if ( $col_1_body ) : ?>
                                        <div class="sv_col_body"><?= wp_kses_post( $col_1_body ); ?></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <div class="sv_col sv_col_type_<?= esc_attr( $col_2_type ); ?>">
                                <?php if ( $col_2_type === 'image' && is_array( $col_2_image ) && $col_2_image['url'] ) : ?>
                                    <img src="<?= esc_url( $col_2_image['url'] ); ?>" alt="<?= esc_attr( $col_2_image['alt'] ); ?>" class="sv_col_img">
                                <?php elseif ( $col_2_type === 'video' && $col_2_video_url ) : ?>
                                    <div class="sv_col_video embed-responsive">
                                        <iframe src="<?= esc_url( $col_2_video_url ); ?>" allowfullscreen></iframe>
                                    </div>
                                <?php elseif ( $col_2_type === 'text' ) : ?>
                                    <?php if ( $col_2_heading ) : ?>
                                        <h3 class="sv_col_heading"><?= esc_html( $col_2_heading ); ?></h3>
                                    <?php endif; ?>
                                    <?php if ( $col_2_body ) : ?>
                                        <div class="sv_col_body"><?= wp_kses_post( $col_2_body ); ?></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                        </div><!-- /.sv_row -->

                    <?php endforeach; ?>
                </div><!-- /.sv_rows -->

                <?php if ( ( $cta_1_label && $cta_1_url ) || ( $cta_2_label && $cta_2_url ) ) : ?>
                    <div class="sv_ctas">
                        <?php if ( $cta_1_label && $cta_1_url ) : ?>
                            <a href="<?= esc_url( $cta_1_url ); ?>" class="btn sv_cta_primary"><?= esc_html( $cta_1_label ); ?></a>
                        <?php endif; ?>
                        <?php if ( $cta_2_label && $cta_2_url ) : ?>
                            <a href="<?= esc_url( $cta_2_url ); ?>" class="btn btn-outline sv_cta_secondary"><?= esc_html( $cta_2_label ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div><!-- /.sv_wrapper -->
        </div><!-- /.sv_panel -->

    <?php else : // separated mode ?>

        <?php if ( $header_enabled && $header_heading ) :
            $header_panel_bg = sv_bg_inline_style( $sv_header_bg_color, $sv_header_bg_image );
        ?>
            <div class="sv_header_panel sv_bg_<?= esc_attr( str_replace('-', '_', $header_bg) ); ?>"<?= $header_panel_bg; ?>>
                <div class="sv_wrapper">
                    <div class="sv_header sv_header_align_<?= esc_attr( $header_alignment ); ?> sv_header_<?= esc_attr( $header_style ); ?>">
                        <h2 class="sv_header_heading"><?= esc_html( $header_heading ); ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php foreach ( $rows as $row ) :

            $col_1_type      = isset( $row['col_1_type'] )      ? $row['col_1_type']      : 'text';
            $col_1_image     = isset( $row['col_1_image'] )     ? $row['col_1_image']     : null;
            $col_1_video_url = isset( $row['col_1_video_url'] ) ? $row['col_1_video_url'] : '';
            $col_1_heading   = isset( $row['col_1_heading'] )   ? $row['col_1_heading']   : '';
            $col_1_body      = isset( $row['col_1_body'] )      ? $row['col_1_body']      : '';

            $col_2_type      = isset( $row['col_2_type'] )      ? $row['col_2_type']      : 'text';
            $col_2_image     = isset( $row['col_2_image'] )     ? $row['col_2_image']     : null;
            $col_2_video_url = isset( $row['col_2_video_url'] ) ? $row['col_2_video_url'] : '';
            $col_2_heading   = isset( $row['col_2_heading'] )   ? $row['col_2_heading']   : '';
            $col_2_body      = isset( $row['col_2_body'] )      ? $row['col_2_body']      : '';
            $row_bg          = isset( $row['row_bg'] )          ? $row['row_bg']          : 'default';
            $row_bg_color    = isset( $row['row_bg_color'] )    ? $row['row_bg_color']    : '';
            $row_bg_image    = isset( $row['row_bg_image'] )    ? $row['row_bg_image']    : null;

            $row_panel_bg = sv_bg_inline_style( $row_bg_color, $row_bg_image );
        ?>

            <div class="sv_row_panel sv_bg_<?= esc_attr( str_replace('-', '_', $row_bg) ); ?>"<?= $row_panel_bg; ?>>
                <div class="sv_wrapper">
                    <div class="sv_row">

                        <div class="sv_col sv_col_type_<?= esc_attr( $col_1_type ); ?>">
                            <?php if ( $col_1_type === 'image' && is_array( $col_1_image ) && $col_1_image['url'] ) : ?>
                                <img src="<?= esc_url( $col_1_image['url'] ); ?>" alt="<?= esc_attr( $col_1_image['alt'] ); ?>" class="sv_col_img">
                            <?php elseif ( $col_1_type === 'video' && $col_1_video_url ) : ?>
                                <div class="sv_col_video embed-responsive">
                                    <iframe src="<?= esc_url( $col_1_video_url ); ?>" allowfullscreen></iframe>
                                </div>
                            <?php elseif ( $col_1_type === 'text' ) : ?>
                                <?php if ( $col_1_heading ) : ?>
                                    <h3 class="sv_col_heading"><?= esc_html( $col_1_heading ); ?></h3>
                                <?php endif; ?>
                                <?php if ( $col_1_body ) : ?>
                                    <div class="sv_col_body"><?= wp_kses_post( $col_1_body ); ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="sv_col sv_col_type_<?= esc_attr( $col_2_type ); ?>">
                            <?php if ( $col_2_type === 'image' && is_array( $col_2_image ) && $col_2_image['url'] ) : ?>
                                <img src="<?= esc_url( $col_2_image['url'] ); ?>" alt="<?= esc_attr( $col_2_image['alt'] ); ?>" class="sv_col_img">
                            <?php elseif ( $col_2_type === 'video' && $col_2_video_url ) : ?>
                                <div class="sv_col_video embed-responsive">
                                    <iframe src="<?= esc_url( $col_2_video_url ); ?>" allowfullscreen></iframe>
                                </div>
                            <?php elseif ( $col_2_type === 'text' ) : ?>
                                <?php if ( $col_2_heading ) : ?>
                                    <h3 class="sv_col_heading"><?= esc_html( $col_2_heading ); ?></h3>
                                <?php endif; ?>
                                <?php if ( $col_2_body ) : ?>
                                    <div class="sv_col_body"><?= wp_kses_post( $col_2_body ); ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div><!-- /.sv_row -->
                </div><!-- /.sv_wrapper -->
            </div><!-- /.sv_row_panel -->

        <?php endforeach; ?>

        <?php if ( ( $cta_1_label && $cta_1_url ) || ( $cta_2_label && $cta_2_url ) ) : ?>
            <div class="sv_ctas sv_ctas_separated">
                <?php if ( $cta_1_label && $cta_1_url ) : ?>
                    <a href="<?= esc_url( $cta_1_url ); ?>" class="btn sv_cta_primary"><?= esc_html( $cta_1_label ); ?></a>
                <?php endif; ?>
                <?php if ( $cta_2_label && $cta_2_url ) : ?>
                    <a href="<?= esc_url( $cta_2_url ); ?>" class="btn btn-outline sv_cta_secondary"><?= esc_html( $cta_2_label ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</div><!-- /.split_view -->

<?php endif; ?>

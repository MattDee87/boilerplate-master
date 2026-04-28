<?php
    // Content Tab
    $show_header      = get_field('ig_show_header');
    $header_heading   = get_field('ig_header_heading');
    $header_sub       = get_field('ig_header_subheading');
    $header_body      = get_field('ig_header_body');
    $header_alignment = get_field('ig_header_alignment') ?: 'center';
    $items            = get_field('ig_items');

    // CTA Tab
    $cta_1_label      = get_field('ig_cta_1_label');
    $cta_1_url        = get_field('ig_cta_1_url');
    $cta_2_label      = get_field('ig_cta_2_label');
    $cta_2_url        = get_field('ig_cta_2_url');

    // Style Tab
    $columns          = intval( get_field('ig_columns') ?: 3 );
    $bg_style         = get_field('ig_background_style') ?: 'default';
    $variant          = get_field('section_variant')     ?: 'default';

    // CSS class slugs
    $bg_class         = 'ig_bg_' . str_replace('-', '_', $bg_style);
    $variant_class    = 'ig_variant_' . str_replace('-', '_', $variant);
    $align_class      = 'ig_header_align_' . $alignment = $header_alignment;

    if ( ! $items && ! $show_header ) return;
?>
<div class="image_grid <?= esc_attr( "$bg_class $variant_class" ); ?>" style="--ig-cols: <?= $columns; ?>">
    <div class="ig_wrapper">

        <?php if ( $show_header && ( $header_heading || $header_sub || $header_body ) ) : ?>
            <div class="ig_header <?= esc_attr( $align_class ); ?>">

                <?php if ( $header_heading ) : ?>
                    <h2 class="ig_header_heading"><?= esc_html( $header_heading ); ?></h2>
                <?php endif; ?>

                <?php if ( $header_sub ) : ?>
                    <p class="ig_header_subheading"><?= esc_html( $header_sub ); ?></p>
                <?php endif; ?>

                <?php if ( $header_body ) : ?>
                    <div class="ig_header_body"><?= wp_kses_post( $header_body ); ?></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if ( $items && is_array( $items ) ) : ?>
            <div class="ig_grid">

                <?php foreach ( $items as $item ) :
                    $type             = isset( $item['ig_item_type'] )             ? $item['ig_item_type']             : 'image';
                    $image            = isset( $item['ig_item_image'] )            ? $item['ig_item_image']            : null;
                    $lightbox_enabled = isset( $item['ig_item_lightbox_enabled'] ) ? $item['ig_item_lightbox_enabled'] : false;
                    $caption          = isset( $item['ig_item_caption'] )          ? $item['ig_item_caption']          : '';
                    $item_text        = isset( $item['ig_item_text'] )             ? $item['ig_item_text']             : '';
                    $link_url         = isset( $item['ig_item_link_url'] )         ? $item['ig_item_link_url']         : '';
                    $link_label       = isset( $item['ig_item_link_label'] )       ? $item['ig_item_link_label']       : '';
                    $img_url          = is_array( $image ) ? $image['url']         : '';
                    $img_alt          = is_array( $image ) ? $image['alt']         : '';
                    $img_full         = is_array( $image ) && isset( $image['sizes']['large'] ) ? $image['sizes']['large'] : $img_url;
                ?>
                    <div class="ig_item ig_item_type_<?= esc_attr( $type ); ?>">
                        <div class="ig_item_inner">

                            <?php if ( $type === 'image' && $img_url ) : ?>

                                <?php if ( $lightbox_enabled ) : ?>
                                    <a href="<?= esc_url( $img_full ); ?>" data-lity class="ig_lightbox_trigger" aria-label="<?= esc_attr( $img_alt ?: 'Enlarge image' ); ?>">
                                        <img src="<?= esc_url( $img_url ); ?>" alt="<?= esc_attr( $img_alt ); ?>" loading="lazy">
                                    </a>
                                <?php elseif ( $link_url ) : ?>
                                    <a href="<?= esc_url( $link_url ); ?>" class="ig_item_link_wrap">
                                        <img src="<?= esc_url( $img_url ); ?>" alt="<?= esc_attr( $img_alt ); ?>" loading="lazy">
                                    </a>
                                <?php else : ?>
                                    <img src="<?= esc_url( $img_url ); ?>" alt="<?= esc_attr( $img_alt ); ?>" loading="lazy">
                                <?php endif; ?>

                                <?php if ( $caption ) : ?>
                                    <p class="ig_caption"><?= esc_html( $caption ); ?></p>
                                <?php endif; ?>

                            <?php elseif ( $type === 'text' ) : ?>

                                <?php if ( $item_text ) : ?>
                                    <div class="ig_item_text"><?= wp_kses_post( $item_text ); ?></div>
                                <?php endif; ?>

                                <?php if ( $link_url && $link_label ) : ?>
                                    <a href="<?= esc_url( $link_url ); ?>" class="ig_item_link"><?= esc_html( $link_label ); ?></a>
                                <?php endif; ?>

                            <?php endif; ?>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

        <?php if ( ( $cta_1_label && $cta_1_url ) || ( $cta_2_label && $cta_2_url ) ) : ?>
            <div class="ig_ctas">
                <?php if ( $cta_1_label && $cta_1_url ) : ?>
                    <a href="<?= esc_url( $cta_1_url ); ?>" class="btn"><?= esc_html( $cta_1_label ); ?></a>
                <?php endif; ?>
                <?php if ( $cta_2_label && $cta_2_url ) : ?>
                    <a href="<?= esc_url( $cta_2_url ); ?>" class="btn btn-outline"><?= esc_html( $cta_2_label ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
</div>

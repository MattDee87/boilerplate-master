<?php
    // Content Tab
    $eyebrow         = get_field('section_eyebrow');
    $heading         = get_field('section_heading');
    $body            = get_field('section_body');

    // Layout Tab
    $layout          = get_field('section_layout') ?: 'centered';
    $media_type      = get_field('media_type')      ?: 'none';
    $media_image     = get_field('media_image');
    $media_video_url = get_field('media_video_url');
    $media_position  = get_field('media_position')  ?: 'left';

    // Items Tab
    $items           = get_field('section_items');

    // CTA Tab
    $cta_1_label     = get_field('cta_1_label');
    $cta_1_url       = get_field('cta_1_url');
    $cta_2_label     = get_field('cta_2_label');
    $cta_2_url       = get_field('cta_2_url');

    // Style Tab
    $bg_style        = get_field('background_style')  ?: 'none';
    $alignment       = get_field('content_alignment') ?: 'center';
    $variant         = get_field('section_variant')   ?: 'default';

    // Build CSS class slugs
    $layout_class    = 'fcs_layout_' . str_replace('-', '_', $layout);
    $bg_class        = 'fcs_bg_' . $bg_style;
    $align_class     = 'fcs_align_' . $alignment;
    $media_class     = ( $layout === 'split' && $media_type !== 'none' ) ? 'fcs_media_' . $media_position : '';
    $variant_class   = 'fcs_variant_' . str_replace('-', '_', $variant);

    // Image array safety
    $image_url = is_array( $media_image ) ? $media_image['url'] : '';
    $image_alt = is_array( $media_image ) ? $media_image['alt'] : '';

    if ( $heading ) :
?>
<section class="flexible_content_section <?= esc_attr( trim( "$layout_class $bg_class $align_class $media_class $variant_class" ) ); ?>">
    <div class="wrapper fcs_wrapper">

        <?php if ( $layout === 'split' ) : ?>

            <div class="fcs_split_row">

                <div class="fcs_content">

                    <?php if ( $eyebrow ) : ?>
                        <p class="fcs_eyebrow"><?= esc_html( $eyebrow ); ?></p>
                    <?php endif; ?>

                    <h2 class="fcs_heading"><?= esc_html( $heading ); ?></h2>

                    <?php if ( $body ) : ?>
                        <div class="fcs_body"><?= wp_kses_post( $body ); ?></div>
                    <?php endif; ?>

                    <?php if ( ( $cta_1_label && $cta_1_url ) || ( $cta_2_label && $cta_2_url ) ) : ?>
                        <div class="fcs_ctas">
                            <?php if ( $cta_1_label && $cta_1_url ) : ?>
                                <a href="<?= esc_url( $cta_1_url ); ?>" class="btn"><?= esc_html( $cta_1_label ); ?></a>
                            <?php endif; ?>
                            <?php if ( $cta_2_label && $cta_2_url ) : ?>
                                <a href="<?= esc_url( $cta_2_url ); ?>" class="btn btn-outline"><?= esc_html( $cta_2_label ); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if ( $media_type === 'image' && $image_url ) : ?>
                    <div class="fcs_media">
                        <img src="<?= esc_url( $image_url ); ?>" alt="<?= esc_attr( $image_alt ); ?>">
                    </div>
                <?php elseif ( $media_type === 'video' && $media_video_url ) : ?>
                    <div class="fcs_media">
                        <div class="embed-responsive">
                            <iframe src="<?= esc_url( $media_video_url ); ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ( $items && is_array( $items ) && count( $items ) > 0 ) : ?>
                <div class="fcs_items fcs_items_count_<?= count( $items ); ?>">
                    <?php foreach ( $items as $item ) :
                        $type    = isset( $item['item_type'] )       ? $item['item_type']       : 'card';
                        $i_head  = isset( $item['item_heading'] )    ? $item['item_heading']    : '';
                        $i_num   = isset( $item['item_number'] )     ? $item['item_number']     : '';
                        $i_text  = isset( $item['item_text'] )       ? $item['item_text']       : '';
                        $i_img   = isset( $item['item_image'] )      ? $item['item_image']      : null;
                        $i_link  = isset( $item['item_link'] )       ? $item['item_link']       : '';
                        $i_label = isset( $item['item_link_label'] ) ? $item['item_link_label'] : '';
                    ?>
                        <div class="fcs_item fcs_item_type_<?= esc_attr( $type ); ?>">

                            <?php if ( is_array( $i_img ) && $i_img['url'] ) : ?>
                                <div class="fcs_item_media">
                                    <img src="<?= esc_url( $i_img['url'] ); ?>" alt="<?= esc_attr( $i_img['alt'] ?: $i_head ); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ( $type === 'stat' && $i_num ) : ?>
                                <p class="fcs_item_number"><?= esc_html( $i_num ); ?></p>
                            <?php endif; ?>

                            <?php if ( $i_head ) : ?>
                                <h3 class="fcs_item_heading"><?= esc_html( $i_head ); ?></h3>
                            <?php endif; ?>

                            <?php if ( $i_text ) : ?>
                                <div class="fcs_item_text"><?= wp_kses_post( $i_text ); ?></div>
                            <?php endif; ?>

                            <?php if ( $type === 'linked_card' && $i_link && $i_label ) : ?>
                                <a href="<?= esc_url( $i_link ); ?>" class="fcs_item_link"><?= esc_html( $i_label ); ?></a>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php else : ?>

            <div class="fcs_content">

                <?php if ( $eyebrow ) : ?>
                    <p class="fcs_eyebrow"><?= esc_html( $eyebrow ); ?></p>
                <?php endif; ?>

                <h2 class="fcs_heading"><?= esc_html( $heading ); ?></h2>

                <?php if ( $body ) : ?>
                    <div class="fcs_body"><?= wp_kses_post( $body ); ?></div>
                <?php endif; ?>

                <?php if ( ( $cta_1_label && $cta_1_url ) || ( $cta_2_label && $cta_2_url ) ) : ?>
                    <div class="fcs_ctas">
                        <?php if ( $cta_1_label && $cta_1_url ) : ?>
                            <a href="<?= esc_url( $cta_1_url ); ?>" class="btn"><?= esc_html( $cta_1_label ); ?></a>
                        <?php endif; ?>
                        <?php if ( $cta_2_label && $cta_2_url ) : ?>
                            <a href="<?= esc_url( $cta_2_url ); ?>" class="btn btn-outline"><?= esc_html( $cta_2_label ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ( $layout === 'centered' ) : ?>
                <?php if ( $media_type === 'image' && $image_url ) : ?>
                    <div class="fcs_media">
                        <img src="<?= esc_url( $image_url ); ?>" alt="<?= esc_attr( $image_alt ); ?>">
                    </div>
                <?php elseif ( $media_type === 'video' && $media_video_url ) : ?>
                    <div class="fcs_media">
                        <div class="embed-responsive">
                            <iframe src="<?= esc_url( $media_video_url ); ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ( $items && is_array( $items ) && count( $items ) > 0 ) : ?>
                <div class="fcs_items fcs_items_count_<?= count( $items ); ?>">
                    <?php foreach ( $items as $item ) :
                        $type    = isset( $item['item_type'] )       ? $item['item_type']       : 'card';
                        $i_head  = isset( $item['item_heading'] )    ? $item['item_heading']    : '';
                        $i_num   = isset( $item['item_number'] )     ? $item['item_number']     : '';
                        $i_text  = isset( $item['item_text'] )       ? $item['item_text']       : '';
                        $i_img   = isset( $item['item_image'] )      ? $item['item_image']      : null;
                        $i_link  = isset( $item['item_link'] )       ? $item['item_link']       : '';
                        $i_label = isset( $item['item_link_label'] ) ? $item['item_link_label'] : '';
                    ?>
                        <div class="fcs_item fcs_item_type_<?= esc_attr( $type ); ?>">

                            <?php if ( is_array( $i_img ) && $i_img['url'] ) : ?>
                                <div class="fcs_item_media">
                                    <img src="<?= esc_url( $i_img['url'] ); ?>" alt="<?= esc_attr( $i_img['alt'] ?: $i_head ); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ( $type === 'stat' && $i_num ) : ?>
                                <p class="fcs_item_number"><?= esc_html( $i_num ); ?></p>
                            <?php endif; ?>

                            <?php if ( $i_head ) : ?>
                                <h3 class="fcs_item_heading"><?= esc_html( $i_head ); ?></h3>
                            <?php endif; ?>

                            <?php if ( $i_text ) : ?>
                                <div class="fcs_item_text"><?= wp_kses_post( $i_text ); ?></div>
                            <?php endif; ?>

                            <?php if ( $type === 'linked_card' && $i_link && $i_label ) : ?>
                                <a href="<?= esc_url( $i_link ); ?>" class="fcs_item_link"><?= esc_html( $i_label ); ?></a>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</section>
<?php endif; ?>

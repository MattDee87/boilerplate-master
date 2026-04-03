<?php if( have_rows('accordion_items') ) : ?>
    <div class="custom_accordion">
        <?php while( have_rows('accordion_items') ): the_row(); ?>

            <?php $unique_id    = bin2hex(random_bytes(8)); ?>
            <?php $title        = get_sub_field('title_accordion'); ?>
            <?php $copy         = get_sub_field('content_accordion'); ?>

            <div class="custom_accordion_item">

                <div class="accordion_header">
                    <button class="custom_accordion_header_button" type="button" data-id="<?php echo esc_attr($unique_id); ?>"><?php echo esc_html($title); ?></button>
                </div>

                <div class="ac_body" data-id="<?php echo esc_attr($unique_id); ?>">
                    <div class="ac_body_measure">
                        <div class="ac_body_inner">
                            <?php echo wp_kses_post($copy); ?>
                        </div>
                    </div>
                </div>

            </div>  

        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php
    // Get All Fields
    $profiles      = get_field('profiles');
    $have_rows     = have_rows('profiles');
    $type          = get_field('type');
    $variant       = get_field('section_variant') ?: 'default';
    $variant_class = 'custom_profiles_variant_' . str_replace('-', '_', $variant);

    // Check for Content
    if($profiles) :
        if( have_rows('profiles') ):
?>
    <section class="custom_profiles <?= esc_attr($variant_class); ?>">
        <div class="wrapper custom_profiles_wrapper">
            <div class="custom_profiles_card">

            <?php while( have_rows('profiles') ): the_row();
                $image          = get_sub_field('image');
                $name           = get_sub_field('name');
                $copy           = get_sub_field('copy');
                $res_data       = get_sub_field('extended_info');
            ?>

                <div class="profile<?php if(!$image) : ?> noimage<?php endif; ?>">
                    <?php $image_url = is_array($image) ? $image['url'] : $image; ?>
                    <div class="profile_image" style="background-image:url('<?php echo esc_url($image_url); ?>')"></div>
                    <div class="profile_content">
                        <h3><?php echo esc_html($name); ?></h3>
                        <?php if($type) : ?>
                            <p>
                                <strong>Hometown:</strong> <?php echo esc_html($res_data['hometown']); ?><br>

                                <strong>School:</strong> <?php echo esc_html($res_data['school']); ?><br>

                                <strong>Interests:</strong> <?php echo esc_html($res_data['interests']); ?>
                            </p>
                            <?php if( !empty($res_data['bio']) ) : ?>
                                <p><?php echo wp_kses_post($res_data['bio']); ?></p>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($copy) : ?>
                                <p><?php echo wp_kses_post($copy); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>

            </div><!-- /.custom_profiles_card -->
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>

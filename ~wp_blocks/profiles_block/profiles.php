<?php 
    // Get All Fields
    $profiles          = get_field('profiles');
    $have_rows         = have_rows('profiles');
    $type              = get_field('type');

    // Check for Content
    if($profiles) :
        if( have_rows('profiles') ):
?>
    <div class="custom_profiles">

        <?php while( have_rows('profiles') ): the_row(); 
            $image          = get_sub_field('image');
            $name           = get_sub_field('name');
            $copy           = get_sub_field('copy');
            $res_data       = get_sub_field('resident_info'); 
        ?>

            <div class="profile<?php if(!$image) : ?> noimage<?php endif; ?>">
                <?php $image_url = is_array($image) ? $image['url'] : $image; ?>
                <div class="profile_image" style="background-image:url('<?php echo esc_url($image_url); ?>')"></div>
                <div class="profile_content">
                    <h3><?php echo esc_html($name); ?></h3>
                    <?php if($type) : ?>
                        <p>
                            <strong>Hometown:</strong> <?php echo esc_html($res_data['hometown']); ?><br>

                            <strong>School:</strong> <?php echo esc_html($res_data['medical_school']); ?><br>

                            <strong>Interests:</strong> <?php echo esc_html($res_data['medical_interests']); ?>
                        </p>
                    <?php else: ?>
                        <?php if($copy) : ?>
                            <p><?php echo wp_kses_post($copy); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
                

        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php endif; ?>

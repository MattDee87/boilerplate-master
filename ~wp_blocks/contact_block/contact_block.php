<?php 
    // Get All Fields
    $title          = get_field('title');
    $copy           = get_field('copy');
    $phone_number   = get_field('phone_number');
    $form           = get_field('include_contact_form');
    if($form){
        $formHTML   = get_field('contact_form','option');
    }
  
    // Check for Title and Copy
    if($title && $copy) :

?>
    <div class="contact_cta">
        <div class="contact_cta_inner">

            <h2><?php echo esc_html($title); ?></h2>
            
            <p><?php echo wp_kses_post($copy); ?></p>

            <?php if($phone_number) : ?>
                <a href="tel:<?php echo esc_attr($phone_number); ?>" class="phone_num"><?php echo esc_html($phone_number); ?></a>
            <?php endif; ?>

            <?php if($form) : ?>
                <?php if($formHTML) : ?>
                    <div class="cta_form_html_house">
                        <?php echo wp_kses_post($formHTML); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>



<?php endif; ?>

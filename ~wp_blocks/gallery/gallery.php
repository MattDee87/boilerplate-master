<?php
    $title = get_field('gallery_title') ? get_field('gallery_title') : "Gallery";
    $images = get_field('gallery_images');
    if( $images ) : 
?>

    <div class="highlights<?php if(count($images) > 1) : ?> fire<?php endif; ?>">
        <h2 id="<?php echo sanitize_title($title); ?>"><?php echo esc_html($title); ?></h2>
        <div class="highlights_slider_wrapper<?php if(count($images) == 1) : ?> one_slide<?php endif; ?>">
            <div class="highlights_slider owl-carousel owl-theme">
                <?php foreach( $images as $image ): ?>
                    <?php 
                        // Calulate what ratio of height versus width for each image to properly set top padding on the element.
                        $iHeight = $image['height'];
                        $iWidth = $image['width'];
                        $percentage = floor(($iHeight/$iWidth) * 100);

                        // Define if image is anything other than a nice landscape size
                        // 1. Image is taller than it is wide
                        // 2. Image is less than 500px tall natively.
                        // 3. Image is less than 900px wide natively.
                        $orientation = ($image['height'] > $image['width'] || $image['height'] < 500 || $image['width'] < 900) ? 'portrait' : 'landscape' ;
                        
                        // If Landscape, set padding-top value for no cropping.
                        $top_padding_value = "";
                        if($orientation == "landscape"){
                            $top_padding_value = "padding-top:" . min($percentage, 65) . "%;";
                        }
                    ?>
                    <div class="item orientation_<?=$orientation;?>" style="background-image:url('<?php echo esc_url($image['url']); ?>');<?php echo esc_attr($top_padding_value); ?>"></div>
                <?php endforeach; ?>
            </div>
            <?php if(count($images) > 1) : ?>
                <div class="slider_meta">
                    <div class="hightlights_dots"></div>
                    <div class="highlights_next_prev">
                        <div class="highlights_prev"><i class="fas fa-arrow-left"></i></div>
                        <div class="highlights_next"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php endif; ?>
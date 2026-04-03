<?php 
    // Get All Fields
    $content          = get_field('content');

    // Check for Content
    if($content) :

?>
    <div class="special_callout">
        <div class="special_callout_inner">
            <?php echo wp_kses_post($content); ?>
        </div>
    </div>
<?php endif; ?>

<?php 
    // Get All Fields
    $title          = get_field('title');
    $location       = get_field('location');
    $date           = get_field('date');
    $time           = get_field('time');

    // Check for Content
    if($title) :

?>
    <div class="event_block">
        <div class="event_block_inner">

            <h2><?php echo esc_html($title); ?></h2>

            <?php if($location) : ?>
            <p class="event_block_detail location_p" aria-label="Event Location"><?php echo esc_html($location); ?></p>
            <?php endif; ?>
            <?php if($date) : ?>
            <p class="event_block_detail date_p" aria-label="Event Date"><?php echo esc_html($date); ?></p>
            <?php endif; ?>
            <?php if($time) : ?>
            <p class="event_block_detail time_p" aria-label="Event Time"><?php echo esc_html($time); ?></p>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>

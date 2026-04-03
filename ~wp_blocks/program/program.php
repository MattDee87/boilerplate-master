<?php 
    // Get All Fields
    $title              = get_field('title');
    $description        = get_field('description');
    $contact            = get_field('contact');
    $file               = get_field('file');
    $thumbnail          = get_field('thumbnail');

    // Check for Content
    if($title) :

?>
    <div class="program_block">

        <?php if($file) : ?>
     
            <?php $file_url = is_array($file) ? $file['url'] : $file; ?>
            <a href="<?php echo esc_url($file_url); ?>" title="Download Program Flier" target="_blank" class="program_block_file" download aria-label="Download PDF: <?php echo esc_attr($title); ?>">
                <?php if($thumbnail) : ?>
                    <?php $thumb_url = is_array($thumbnail) ? $thumbnail['url'] : $thumbnail; ?>
                    <div class="program_block_file_thumb thumbnail" style="background-image:url('<?php echo esc_url($thumb_url); ?>');"></div>
                <?php else : ?>
                    <div class="program_block_file_thumb no_thumbnail"></div>
                <?php endif; ?>
                <span>Download PDF</span>
            </a>
             
        <?php endif; ?>


        <div class="program_block_inner<?php if($file): ?> has_file<?php endif; ?>">


            <h2><?php echo esc_html($title); ?></h2>

            <?php if($description) : ?>
            <p class="program_block_descripton" aria-label="Program Description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <?php if($contact) : ?>
            <p class="program_block_contact" aria-label="Program Contact Information"><?php echo esc_html($contact); ?></p>
            <?php endif; ?>
          

        </div>
    </div>
<?php endif; ?>

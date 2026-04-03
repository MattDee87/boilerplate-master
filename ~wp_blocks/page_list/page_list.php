<?php

    $page_list = get_field('list_pages');
    if( $page_list ): 
?>
    <div class="options_list">
        <?php foreach( $page_list as $the_page ): 
            $permalink = get_permalink( $the_page->ID );
            $title = get_the_title( $the_page->ID );
        ?>
            <a href="<?php echo esc_url($permalink);?>" class="option">
                <div class="option_inner_text">
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
            </a>
            
        <?php 
            endforeach;
            wp_reset_postdata();
        ?>
    </div>
<?php endif; ?>
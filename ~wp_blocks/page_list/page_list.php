<?php
    $page_list     = get_field('list_pages');
    $variant       = get_field('section_variant') ?: 'default';
    $variant_class = 'options_list_variant_' . str_replace('-', '_', $variant);
    if( $page_list ):
?>
    <section class="options_list <?= esc_attr($variant_class); ?>">
        <div class="wrapper options_list_wrapper">
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
    </section>
<?php endif; ?>
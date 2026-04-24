<?php
/*
==========================================================
TESTIMONIALS BLOCK — testimonials.php
==========================================================
ACF FIELDS REQUIRED:
Create a field group in ACF and assign it to this block.
Field group name suggestion: "Testimonials Block"
 
Fields needed:
- testimonials_title        Text (optional section heading)
- testimonials_columns      Select → 2 / 3 (default: 3)
- testimonials_items        Repeater
  └── quote                 Textarea
  └── name                  Text
  └── role                  Text
  └── company               Text
  └── photo                 Image (return: array)
  └── rating                Select → 0 / 1 / 2 / 3 / 4 / 5
 
TO SIMPLIFY TO OPTION A (single testimonial):
- Remove the repeater field
- Add single versions of: quote, name, role, company, photo
- Remove the foreach loop below
- Wrap the single card HTML directly without a grid
 
TO SIMPLIFY TO OPTION B (stacked list):
- Keep the repeater field as is
- In testimonials.css change grid-template-columns to 1fr
- Remove the columns select field from ACF
==========================================================
*/
 
// Get All Fields
$title         = get_field('testimonials_title');
$columns       = get_field('testimonials_columns') ?: '3';
$items         = get_field('testimonials_items');
$variant       = get_field('section_variant') ?: 'default';
$variant_class = 'testimonials_block_variant_' . str_replace('-', '_', $variant);

if ( $items ) :
?>

<div class="testimonials_block <?= esc_attr($variant_class); ?>">
 
    <?php if ( $title ) : ?>
        <div class="testimonials_header">
            <h2 class="testimonials_title"><?php echo esc_html($title); ?></h2>
        </div>
    <?php endif; ?>
 
    <div class="testimonials_grid testimonials_cols_<?php echo esc_attr($columns); ?>">
 
        <?php foreach ( $items as $item ) :
            $quote      = $item['quote'];
            $name       = $item['name'];
            $role       = $item['role'];
            $company    = $item['company'];
            $photo      = $item['photo'];
            $rating     = $item['rating'];
        ?>
 
            <div class="testimonial_card">
 
                <!-- Star Rating -->
                <?php if ( $rating && $rating > 0 ) : ?>
                    <div class="testimonial_stars" aria-label="<?php echo esc_attr($rating); ?> out of 5 stars">
                        <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                            <span class="testimonial_star <?php echo ($i <= $rating) ? 'filled' : 'empty'; ?>" aria-hidden="true">★</span>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
 
                <!-- Quote -->
                <?php if ( $quote ) : ?>
                    <blockquote class="testimonial_quote">
                        "<?php echo esc_html($quote); ?>"
                    </blockquote>
                <?php endif; ?>
 
                <!-- Author -->
                <div class="testimonial_author">
 
                    <?php if ( $photo ) : ?>
                        <div class="testimonial_photo" style="background-image: url('<?php echo esc_url($photo['url']); ?>');" aria-hidden="true"></div>
                    <?php endif; ?>
 
                    <div class="testimonial_author_info">
                        <?php if ( $name ) : ?>
                            <p class="testimonial_name"><?php echo esc_html($name); ?></p>
                        <?php endif; ?>
                        <?php if ( $role || $company ) : ?>
                            <p class="testimonial_role">
                                <?php echo esc_html($role); ?>
                                <?php if ( $role && $company ) echo ' — '; ?>
                                <?php echo esc_html($company); ?>
                            </p>
                        <?php endif; ?>
                    </div>
 
                </div><!-- /.testimonial_author -->
 
            </div><!-- /.testimonial_card -->
 
        <?php endforeach; ?>
 
    </div><!-- /.testimonials_grid -->
 
</div><!-- /.testimonials_block -->
 
<?php endif; ?>
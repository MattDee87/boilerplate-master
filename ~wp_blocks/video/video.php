<?php
/*
==========================================================
VIDEO BLOCK — video.php
==========================================================
ACF FIELDS REQUIRED:
Create a field group in ACF and assign it to this block.
Field group name suggestion: "Video Block"

Fields needed:
- video_url              URL (YouTube, Vimeo, Loom, or any iframe URL)
- video_poster           Image (return: array) — thumbnail shown before play
- video_title            Text (optional — shown below the poster)
- video_caption          Textarea (optional — shown below the title)

OPTION C ADDITIONAL FIELDS (currently commented out below):
- video_eyebrow          Text
- video_description      Textarea
- video_bg_color         Color Picker
- video_bg_image         Image (return: array)
- video_overlay_opacity  Number (min: 0, max: 100)

SUPPORTED VIDEO URLS:
- YouTube:  https://www.youtube.com/watch?v=VIDEOID
- Vimeo:    https://vimeo.com/VIDEOID
- Loom:     https://www.loom.com/share/VIDEOID
- Any direct iframe embed URL

HOW IT WORKS:
The block shows a poster image with a play button.
Clicking the poster opens a modal lightbox with the
video embedded as an iframe. The video URL is
automatically converted to an embed URL by video.js.
The iframe is injected on click — this prevents
autoplay issues and improves page load performance.

TO SIMPLIFY TO OPTION A (embed only, no poster):
- Remove video_poster, video_title, video_caption ACF fields
- Remove the poster image section below
- The video will render inline without a lightbox

TO UPGRADE TO OPTION C (full section wrapper):
- Add the Option C ACF fields listed above
- Uncomment the Option C sections below
==========================================================
*/

// Get All Fields
$video_url      = get_field('video_url');
$poster         = get_field('video_poster');
$title          = get_field('video_title');
$caption        = get_field('video_caption');

/*
==========================================================
OPTION C FIELDS — uncomment to enable full section wrapper
==========================================================
$eyebrow        = get_field('video_eyebrow');
$description    = get_field('video_description');
$bg_color       = get_field('video_bg_color') ?: '';
$bg_image       = get_field('video_bg_image');
$overlay_opacity = get_field('video_overlay_opacity') ?: 50;

$bg_styles = '';
if ( $bg_image ) {
    $bg_styles .= 'background-image: url(' . esc_url( $bg_image['url'] ) . ');';
} elseif ( $bg_color ) {
    $bg_styles .= 'background-color: ' . esc_attr( $bg_color ) . ';';
}
$overlay_decimal = ($overlay_opacity / 100);
==========================================================
*/

// Require video URL to render
if ( $video_url ) :

    // Generate unique ID for this block instance
    $unique_id = 'video_' . bin2hex(random_bytes(4));

?>

<?php
/*
==========================================================
OPTION C WRAPPER — uncomment to enable full section
==========================================================
?>
<div class="video_section" style="<?php echo $bg_styles; ?>">
    <?php if ( $bg_image ) : ?>
        <div class="video_section_overlay" style="background: rgba(0,0,0,<?php echo $overlay_decimal; ?>);"></div>
    <?php endif; ?>
    <div class="video_section_inner">
        <?php if ( $eyebrow ) : ?>
            <p class="video_eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>
        <?php if ( $description ) : ?>
            <p class="video_description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
<?php
==========================================================
*/
?>

<div class="video_block">

    <!-- Video Trigger — poster image with play button -->
    <div class="video_trigger"
         data-video-id="<?php echo esc_attr($unique_id); ?>"
         data-video-url="<?php echo esc_url($video_url); ?>"
         role="button"
         tabindex="0"
         aria-label="Play video<?php if($title) echo ': ' . esc_attr($title); ?>"
    >

        <?php if ( $poster ) : ?>
            <img
                src="<?php echo esc_url($poster['url']); ?>"
                alt="<?php echo esc_attr($poster['alt'] ?: ($title ?: 'Video thumbnail')); ?>"
                class="video_poster"
                loading="lazy"
            >
        <?php else : ?>
            <!-- Fallback poster if no image set -->
            <div class="video_poster video_poster_fallback"></div>
        <?php endif; ?>

        <!-- Play button overlay -->
        <div class="video_play_btn" aria-hidden="true">
            <div class="video_play_icon">
                <i class="fas fa-play"></i>
            </div>
        </div>

    </div><!-- /.video_trigger -->

    <!-- Optional title and caption -->
    <?php if ( $title || $caption ) : ?>
        <div class="video_meta">
            <?php if ( $title ) : ?>
                <p class="video_title"><?php echo esc_html($title); ?></p>
            <?php endif; ?>
            <?php if ( $caption ) : ?>
                <p class="video_caption"><?php echo esc_html($caption); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div><!-- /.video_block -->

<?php
/*
==========================================================
OPTION C CLOSING TAGS — uncomment with opening wrapper
==========================================================
    </div><!-- /.video_section_inner -->
</div><!-- /.video_section -->
==========================================================
*/
?>


<!-- ============================================================
     VIDEO MODAL LIGHTBOX
     One modal per block instance — unique ID keeps multiple
     video blocks on the same page from conflicting.
     ============================================================ -->
<div class="video_modal" id="<?php echo esc_attr($unique_id); ?>" role="dialog" aria-modal="true" aria-label="Video player" hidden>
    <div class="video_modal_backdrop"></div>
    <div class="video_modal_content">
        <button class="video_modal_close" aria-label="Close video">
            <i class="fas fa-times"></i>
        </button>
        <div class="video_modal_iframe_house">
            <!-- iframe injected here by video.js on click -->
        </div>
    </div>
</div>

<?php endif; ?>
// Don't initialize in the block editor
if ( typeof wp !== 'undefined' && wp.blocks ) {
    return;
}

$(function () {

    /*
    ==========================================================
    VIDEO BLOCK — video.js
    ==========================================================
    Handles the lightbox modal for the Video block.

    WHAT IT DOES:
    - Listens for clicks on .video_trigger elements
    - Converts the raw video URL to an embed URL
    - Injects an iframe into the modal on click
    - Opens the modal with a fade animation
    - Removes the iframe on close to stop video playback
    - Supports keyboard (Escape to close) and accessibility

    SUPPORTED PLATFORMS:
    - YouTube  (youtube.com/watch?v= or youtu.be/)
    - Vimeo    (vimeo.com/VIDEOID)
    - Loom     (loom.com/share/VIDEOID)
    - Any direct iframe embed URL (fallback)
    ==========================================================
    */

    // Convert any supported video URL to an embed URL
    function getEmbedUrl(url) {

        // YouTube — handle both watch and youtu.be formats
        var youtubeMatch = url.match(
            /(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/
        );
        if (youtubeMatch) {
            return 'https://www.youtube.com/embed/' + youtubeMatch[1] + '?autoplay=1&rel=0';
        }

        // Vimeo
        var vimeoMatch = url.match(/vimeo\.com\/(\d+)/);
        if (vimeoMatch) {
            return 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1';
        }

        // Loom
        var loomMatch = url.match(/loom\.com\/share\/([a-zA-Z0-9]+)/);
        if (loomMatch) {
            return 'https://www.loom.com/embed/' + loomMatch[1] + '?autoplay=1';
        }

        // Fallback — return URL as-is (direct iframe embed)
        return url;
    }

    // Open modal
    function openModal(modal, embedUrl) {
        var iframeHouse = modal.find('.video_modal_iframe_house');

        // Inject iframe
        iframeHouse.html(
            '<iframe' +
            ' src="' + embedUrl + '"' +
            ' frameborder="0"' +
            ' allow="autoplay; fullscreen; picture-in-picture"' +
            ' allowfullscreen' +
            ' title="Video player"' +
            '></iframe>'
        );

        // Show modal
        modal.removeAttr('hidden');
        modal.addClass('is_open');
        $('body').addClass('video_modal_open');

        // Focus close button for accessibility
        modal.find('.video_modal_close').focus();
    }

    // Close modal
    function closeModal(modal) {
        modal.removeClass('is_open');
        $('body').removeClass('video_modal_open');

        // Wait for animation then hide and clear iframe
        setTimeout(function () {
            modal.attr('hidden', true);
            modal.find('.video_modal_iframe_house').html('');
        }, 300);
    }

    // Click on video trigger
    $(document).on('click touchend keydown', '.video_trigger', function (e) {
        e.preventDefault();

        // Allow keyboard activation (Enter or Space)
        if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') return;

        var trigger     = $(this);
        var videoId     = trigger.data('video-id');
        var rawUrl      = trigger.data('video-url');
        var embedUrl    = getEmbedUrl(rawUrl);
        var modal       = $('#' + videoId);

        if (modal.length) {
            openModal(modal, embedUrl);
        }
    });

    // Close on backdrop click
    $(document).on('click', '.video_modal_backdrop', function () {
        closeModal($(this).closest('.video_modal'));
    });

    // Close on close button click
    $(document).on('click', '.video_modal_close', function () {
        closeModal($(this).closest('.video_modal'));
    });

    // Close on Escape key
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            var openModal = $('.video_modal.is_open');
            if (openModal.length) {
                closeModal(openModal);
            }
        }
    });

});
$(function(){

    /*
    ================================================
    SCROLL TO TOP
    ================================================
    Shows a scroll-to-top button when the user
    scrolls down 300px. Clicking it smoothly
    scrolls back to the top of the page.
    ================================================
    */

    // Show/hide button on scroll
    $(window).on('scroll', function(){
        if ( $(this).scrollTop() > 300 ) {
            $('#top').addClass('on');
        } else {
            $('#top').removeClass('on');
        }
    });

    // Smooth scroll to top on click
    $('#top').on('click keydown', function(e){
        if ( e.type === 'click' || e.key === 'Enter' || e.key === ' ' ) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, 500);
        }
    });

    // Custom Gallery Block — Owl Carousel Init
    // Moved from gallery.js to ensure jQuery and Owl Carousel
    // are loaded before initialization
    $(".highlights.fire").each(function () {
        var el = $(this);
        var slider = el.find('.owl-carousel');
        var dots_container = el.find('.hightlights_dots');
        var button_prev = el.find('.highlights_prev');
        var button_next = el.find('.highlights_next');

        slider.owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            dots: true,
            dotsContainer: dots_container,
            autoHeight: true
        });

        button_prev.click(function () {
            slider.trigger('prev.owl.carousel');
        });

        button_next.click(function () {
            slider.trigger('next.owl.carousel');
        });
    });

    // Custom Accordion Block — Toggle
    // Moved from accordion.js to ensure jQuery is loaded before initialization
    $('.custom_accordion_header_button').on('click', function () {
        var el = $(this);
        var id = el.data('id');
        var target = $('.ac_body[data-id="' + id + '"]');
        var measure = target.children('.ac_body_measure');
        var height = measure.height();

        if (target.height() == 0) {
            target.height(height);
            el.addClass('active');
        } else {
            target.height(0);
            el.removeClass('active');
        }
    });

    // Window resize handler — recalculates open panel heights
    $(window).on('resize', function () {
        $('.ac_body').each(function () {
            var el = $(this);
            if (el.height() > 0) {
                var measure = el.children('.ac_body_measure');
                var height = measure.height();
                el.height(height);
            }
        });
    });

    // Custom Video Block — Lightbox Init
    // Moved from video.js to ensure jQuery is loaded before initialization
    // Supports YouTube, Vimeo, Loom, and any direct iframe embed URL

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

    function openVideoModal(modal, embedUrl) {
        var iframeHouse = modal.find('.video_modal_iframe_house');

        iframeHouse.html(
            '<iframe' +
            ' src="' + embedUrl + '"' +
            ' frameborder="0"' +
            ' allow="autoplay; fullscreen; picture-in-picture"' +
            ' allowfullscreen' +
            ' title="Video player"' +
            '></iframe>'
        );

        modal.removeAttr('hidden');
        modal.addClass('is_open');
        $('body').addClass('video_modal_open');
        modal.find('.video_modal_close').focus();
    }

    function closeVideoModal(modal) {
        modal.removeClass('is_open');
        $('body').removeClass('video_modal_open');

        setTimeout(function () {
            modal.attr('hidden', true);
            modal.find('.video_modal_iframe_house').html('');
        }, 300);
    }

    // Click on video trigger
    $(document).on('click keydown', '.video_trigger', function (e) {
        if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') return;
        e.preventDefault();

        var trigger  = $(this);
        var videoId  = trigger.data('video-id');
        var rawUrl   = trigger.data('video-url');
        var embedUrl = getEmbedUrl(rawUrl);
        var modal    = $('#' + videoId);

        if (modal.length) {
            openVideoModal(modal, embedUrl);
        }
    });

    // Close on backdrop click
    $(document).on('click', '.video_modal_backdrop', function () {
        closeVideoModal($(this).closest('.video_modal'));
    });

    // Close on close button click
    $(document).on('click', '.video_modal_close', function () {
        closeVideoModal($(this).closest('.video_modal'));
    });

    // Close on Escape key
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            var openModal = $('.video_modal.is_open');
            if (openModal.length) {
                closeVideoModal(openModal);
            }
        }
    });

});
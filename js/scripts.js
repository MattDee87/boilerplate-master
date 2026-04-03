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

});
$(function(){
    // Custom Gallery Block
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
});
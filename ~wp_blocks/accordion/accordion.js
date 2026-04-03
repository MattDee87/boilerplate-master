$(function(){
    // Custom Accordions
    $('.custom_accordion_header_button').on('click', function () {

        // Define 'this' meaning the button you just pressed
        var el = $(this);

        // Get the id from the html attribute data-id on 'el'
        var id = el.data('id');

        // Target the div that we'll ultimately be adjusting the height of based on it sharing the same data-id attribute value
        var target = $('.ac_body[data-id="' + id + '"]');

        /* 
        Measure the target's child div to get an accurate reading of how tall the 
        inner contents of the "target" are. If you measure the "target," you'll get a false
        reading due to margin and padding and border dimensions. This is a JS "quirk" with how it measures.
        */
        var measure = target.children('.ac_body_measure');
        var height = measure.height();

        // If the target's height is 0, it's closed. So open it...
        if (target.height() == 0) {

            // Open
            target.height(height);
            // Toggle the Dropdown Arrow to be inverted with a class - (CSS uses transform: rotate(180deg); )
            el.addClass('active');

            // If you want to have only one open at a time, we'll close all the .ac_body divs that are NOT the 'target"
            // $('.ac_body').not(target).height(0);

        } else {

            // Close
            target.height(0);
            el.removeClass('active');
        }

    });

    /*
    Since we are setting the height of divs using hardcoded inline css height rules, if the user resizes the window,
    the text within the dropdown may wrap and become "taller" which would otherwise break out of the fixed height box we've set.

    To accomodate that, we listen for the window resizing and when it does, we rerun the measuring and re-heightification (lol)
    of the .ac_body divs that may be open.
    */
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
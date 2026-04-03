$(function(){

    /*
    
        11/2024 - Cameron Bruhns

        This is a pretty standalone jQuery dependant script for handling the
        switching of classes and expanding of nav and dropdown nav sub-navs
        for mobile view. The classes all correspond to the stylesheet in
        this package.

    */ 


    // Mobile Nav
    $('#mnavbutton').on('click', function () {
        var el = $(this);
        el.toggleClass('opened');
        var header = $('header');
        var nav = $('header nav');
        nav.toggleClass('active');
        header.toggleClass('active');
    });
    $('.subnav_more').on('click', function () {
        var el = $(this);
        var target = el.siblings('.sub_nav');
        var arrow = el.children('i');
        target.toggleClass('active');
        arrow.toggleClass('fa-angle-up fa-angle-down');
        $('.sub_nav').not(target).removeClass('active');
        $('.subnav_more i').not(arrow).removeClass('fa-angle-up').addClass('fa-angle-down');
    });


});
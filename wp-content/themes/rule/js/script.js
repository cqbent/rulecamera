/**
 * Created by user on 11/20/15.
 */

jQuery(document).ready(function($) {
   // check for sidebar-left. if exists then add class to body
    if ($('.sidebar-left').length) {
        $('body').addClass('sidebar-left');
    }
    if ($('.sidebar-right').length) {
        $('body').addClass('sidebar-right');
    }
    if ($('.sidebar-left').length & $('.sidebar-right').length) {
        $('body').addClass('sidebar-both');
    }

    if ($('header').hasClass('rentals')) {
        $('.how-to-link').attr('href','/how-to-rent-from-us');
        $('.how-to-link').text('How to Rent from Us');
    }

    // place sales and rentals menu items inside their custom menu list
    $('#menu-main-menu > li.menu-item-type-taxonomy').each(function() {
        var menu_items = $(this).find('ul.sub-menu:not(.cat-menu)').html();
        $(this).find('ul.cat-menu').append(menu_items);
    });

    // home banner random generator
    /*
    $('.page-template-template-homepage #main .home-banner')
        .css('background-image','url(/wp-content/themes/rule/images/home_banner_'+getRandomIntInclusive(1, 4)+'.jpg');
    function getRandomIntInclusive(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    */
    // CC signup form colorbox
    $("a.signup").colorbox({
        width:"60%",
        height:"600px",
        inline:true,
        href:"#cc-signup"
    });

    // load flexslider for home page banner
    $('.home-banner.flexslider').flexslider({
        controlNav: false,
        directionNav: false,
        slideshowSpeed: 4500,
        animation: 'fade',
        pauseOnHover: true,
    });


});
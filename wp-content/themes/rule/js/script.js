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

});
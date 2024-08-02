jQuery(document).ready(function ($) {

        console.log('fixed_header');

        const mobileWidth = 979;
        const offset = 100;
        let headerHeight = jQuery('#masthead').height();

    if (window.innerWidth > mobileWidth) {

        $(window).scroll(function () {
            if ($(this).scrollTop() > offset) {
                $('#masthead .header-content').addClass('fixed-header');
                $('body').css('margin-top', headerHeight);
            } else {
                $('#masthead .header-content').removeClass('fixed-header');
                $('body').css('margin-top', '0');
            }
        });

    }

});
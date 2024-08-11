jQuery(document).ready(function ($) {

    var mobileBreakpoint = 757;

    if ($("#warehouse-slider").length > 0) {
        $("#warehouse-slider").slick({
            dots: false,
            arrows: true,
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon-angle-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon-angle-right' aria-hidden='true'></i></button>",
            infinite: false,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 300,
            fade: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: mobileBreakpoint,
                settings: {
                    //arrows: false,
                    // dots: true,
                    slidesToShow: 1
                }
            }]
        })
    }

});
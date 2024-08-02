jQuery(document).ready(function ($) {

    console.log('contactform7');

    $('.wpcf7-form input').focusin(function () {
        $(this).parent().next().addClass("focused");
    });
    $('.wpcf7-form textarea').focusin(function () {
        $(this).parent().next().addClass("focused");
    });
    $('.wpcf7-form input').focusout(function () {
        if (!$(this).val() !="") {
            $(this).parent().next().removeClass("focused");
        }
    });
    $('.wpcf7-form textarea').focusout(function () {
        if (!$(this).val() !="") {
            $(this).parent().next().removeClass("focused");
        }
    });

});
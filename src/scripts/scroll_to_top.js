jQuery(document).ready(function($){

    console.log('scroll_to_top');

    const offset = 100;
    const speed = 600;
    const duration = 500;

    $(window).scroll(function(){
        if ($(this).scrollTop() < offset) {
            $('.topbutton') .fadeOut(duration);
        } else {
            $('.topbutton') .fadeIn(duration);
        }
    });
    $('.topbutton').on('click', function(){
        $('html, body').animate({scrollTop:0}, speed);
        return false;
    });
});
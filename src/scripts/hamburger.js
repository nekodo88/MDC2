    console.log('hamburger');

    const mobileWidth = 979;
    const hamburger = document.querySelector('.hamburger-menu a');
    const bodyElement = document.querySelector('body');
    const siteNav = document.querySelector('#site-navigation');
    let visible = false;

    function hamburgerClick() {

        const duration = .3;

        if (!visible) {
            gsap.from(siteNav, {x: -200, duration: duration});
            bodyElement.classList.add('mobile-menu');
            hamburger.classList.replace('icon-menu-1', 'icon-cancel-1');
            visible = true;
        } else {
            visible = false;
            gsap.to(siteNav, {x: -200, duration: duration, clearProps: 'x'});
            hamburger.classList.replace('icon-cancel-1', 'icon-menu-1');
            setTimeout(function () {
                bodyElement.classList.remove('mobile-menu');
            }, duration * 900);
        }

    }

    hamburger.onclick = hamburgerClick;

    function mobileMenuWindowResize() {
        if (window.innerWidth > mobileWidth) {
            bodyElement.classList.remove('mobile-menu');
            visible = false;
        }
    }

    window.onresize = mobileMenuWindowResize;

//ANIMATIONS

jQuery(document).ready(function($){

	$('#nav-icon1').click(function(){
		$(this).toggleClass('open');
	});

    if (window.innerWidth < mobileWidth) {
        $('ul#primary-menu-list a').click(function() {
            hamburger.click();
        });
    }



});
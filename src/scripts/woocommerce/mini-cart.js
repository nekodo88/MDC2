if(document.querySelector('.woocommerce')) {

    console.log('mini-cart');

    const headerBasket = document.getElementById('header-basket');
    const miniCart = document.getElementById('mini-cart');

    const slideDown = elem => elem.style.height = `${elem.scrollHeight}px`;

    headerBasket.addEventListener('mouseenter', function () {
        slideDown(miniCart);
    });

    headerBasket.addEventListener('mouseleave', function () {
        miniCart.style.height = 0;
    })
}
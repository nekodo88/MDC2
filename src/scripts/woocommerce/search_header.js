if(document.querySelector('.woocommerce')) {
    console.log('search_header');
    const searchIcon = document.querySelector('#header-search .icon-search');
    const closeIcon = document.querySelector('.header-search-form > a');
    const bodyElement = document.querySelector('body');

    searchIcon.addEventListener('click', function () {
        bodyElement.classList.add('search-open');
    });

    closeIcon.addEventListener('click', function () {
        bodyElement.classList.remove('search-open');
    });
}


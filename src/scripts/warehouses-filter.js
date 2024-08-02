jQuery(document).ready(function ($){
    $('#search-button').on('click', function(event) {
        event.preventDefault();

        const location = $('#location').val();
        const size = $('#size').val();

        const warehouses = $('.warehouse-item');

        warehouses.each(function() {
            const warehouse = $(this);
            const warehouseLocation = warehouse.find('.city').text().trim();
            const warehouseSizeText = warehouse.find('.warehouse-details li span').text();
            const warehouseSize = parseInt(warehouseSizeText.replace(/[^0-9]/g, ''));

            let locationMatch = true;
            let sizeMatch = true;

            if (location && warehouseLocation !== location) {
                locationMatch = false;
            }

            if (size && warehouseSize < parseInt(size)) {
                sizeMatch = false;
            }

            if (locationMatch && sizeMatch) {
                warehouse.fadeIn();
            } else {
                warehouse.fadeOut();
            }
        });

        $('html, body').animate({
            scrollTop: $('#warehouses-list').offset().top
        }, 1000);
    });
});
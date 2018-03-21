var filterActive;

function filterCategory(category) {
    if (filterActive != category) {
        
        // reset results list
        $('.card-wrapper .card').removeClass('active');
        
        // elements to be filtered
        $('.card-wrapper .card')
            .filter('[data-cat="' + category + '"]')
            .addClass('active');
        
        // reset active filter
        filterActive = category;
        $('.spaces button').removeClass('active');
    }
}

$('.card-wrapper .card').addClass('active');

$('.spaces button').click(function() {
    if ($(this).hasClass('all')) {
        $('.card-wrapper .card').addClass('active');
        filterActive = 'all';
        $('.spaces button').removeClass('active');
    } else {
        filterCategory($(this).attr('data-cat'));
    }
    $(this).addClass('active');
});

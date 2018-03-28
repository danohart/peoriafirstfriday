function filterCategory(category) {         
    // elements to be filtered
    if(category == 'All') { 
        $('.card').show();
    } else {
        $('.card').hide();
        $('[data-cat*="' + category + '"]').addClass('active').show();
    }
}

$('.spaces button').click(function() {
    $('button').removeClass('active');
    if ($(this).hasClass('all')) {
        $('.card-wrapper .card').addClass('active');
        $('.spaces button').removeClass('active');
        filterCategory($(this).attr('data-cat'));
    } else {
        $(this).addClass('active');
        filterCategory($(this).attr('data-cat'));
    }
    $(this).addClass('active');
});
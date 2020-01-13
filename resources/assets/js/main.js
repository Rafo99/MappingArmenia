

$(function(){
    $('.dropdown').on('click', function () {
        $(this).parent().find('.dropdown-content').toggle();
    });

    let dropdown = $('.dropdown-content');
    $(document).mouseup(e => {
        if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0)
        {
            dropdown.hide();
        }
    });



});
$('ul li a').click(function() {
    $(this).closest('ul').find('a').removeClass('active');
    $(this).addClass('active');
});
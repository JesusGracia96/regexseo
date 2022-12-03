function disable() {
    // To get the scroll position of current webpage
    TopScroll = window.pageYOffset || document.documentElement.scrollTop;
    LeftScroll = window.pageXOffset || document.documentElement.scrollLeft,

        // if scroll happens, set it to the previous value
        window.onscroll = function() {
            window.scrollTo(LeftScroll, TopScroll);
        };
}

function enable() {
    window.onscroll = function() {};
}

$('.image-prev').click(function() {
    disable();
    let imageSrc = $(this).attr('src');
    let title = $(this).siblings('.image-title').text();
    $("#image-view").removeClass('d-none');
    $("#image-view").find('#title-view-image').text(title);
    $("#image-view img").attr('src', imageSrc);
    $('.dark-bg').removeClass('d-none');
    $('.dark-bg').css('top', window.pageYOffset)
    $('.dark-bg').css('left', window.pageXOffset)
    $('#image-view').css('top', "calc(" + window.pageYOffset + " + 50%)" )
    $('#image-view').css('left', "calc(" + window.pageXOffset + " - 50%)" )
});

$('#closeImage').click(function(e) {
    enable();
    $("#image-view").addClass('d-none');
    $('.dark-bg').addClass('d-none');

});
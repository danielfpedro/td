$(function(){

    $('.container-deck-list').css({
        width: $('.container-deck-list').parent().width(),
        height: $(window).height() - 100
    });

    $('.container-deck-list').affix({
        offset: {
            top: $('.container-deck-list').offset().top + 5,
            bottom: $('.footer').height()
        }
    });
});
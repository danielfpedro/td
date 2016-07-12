$(function(){

    $('.btn-latest-posts-load-more').click(function(){
        var $this = $(this);
        var page = $this.data('page');
        var url = $this.data('url');
        var $legend = $('.load-more-legend');

        var currentHtml = $this.html();
        $this
            .html('<span class="fa fa-spinner fa-spin"></span>')
            .attr('disabled', true);

        window.setTimeout(function(){
            $loadMore = $('<div/>');
            $loadMore.hide();
            $loadMore.load(url, {page: page}, function(data, xhr, code){
                $this.data('page', (page + 1));
                $('.lastest-posts-load-more').append($(this));
                
                if (!code.responseText) {
                    $this.fadeOut(function(){
                        $msg = $('<em/>').text('Todos os posts foram carregados.').css({display: 'none'});
                        $legend.append($msg);
                        $msg.fadeIn();
                    });
                } else {
                    $this
                    	.html(currentHtml)
                    	.attr('disabled', false);
                    $(this).slideDown();
                }
            });
        });
    });
});
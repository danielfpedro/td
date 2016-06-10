<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?= $this->fetch('title') ?>Papo de Taverna</title>


        <?= $this->Html->css('../lib/animate.css/animate.min') ?>
        <!-- Bootstrap -->
        <?= $this->Html->css('../lib/bootstrap/dist/css/bootstrap.min') ?>
        
        <?= $this->Html->css('../lib/font-awesome/css/font-awesome.min') ?>
        
        <!-- My style -->
        <?= $this->Html->css('style.min') ?>
        <?= $this->fetch('css') ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?= $this->fetch('content') ?>

        <div class="box-margin-top-x-3">
            <?= $this->element('Site/footer') ?>
        </div>

        <?= $this->Html->script('../lib/jquery/dist/jquery.min') ?>
        <?= $this->Html->script('../lib/bootstrap/dist/js/bootstrap.min') ?>
        
        <?= $this->Html->script('../lib/anchor-js/anchor.min') ?>

        <?= $this->fetch('script') ?>

<script>
    $(function(){
        var speed = 200;
        $('a.latests-posts-share').mouseenter(function(){
            $(this).fadeOut(speed, function(){
                $('latests-posts-share-list-buttons').fadeIn(speed);
            });
        });
        $('ul.latests-posts-share-list-buttons').mouseleave(function(){
            $(this).fadeOut(speed, function(){
                $('latests-posts-share').fadeIn(speed);
            });
        });
    });

$(function () {

    $('.btn-navbar-search').click(function(){
        $('.navbar-hidden-search').fadeToggle();
        $('#q').focus();
        return false;
    });

        // Remove Search if user Resets Form or hits Escape!
        $('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
            console.log(event.currentTarget);
            if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
                $(event.currentTarget).attr('type') == 'reset') {
                closeSearch();
            }
        });

        function closeSearch() {
            var $form = $('.navbar-collapse form[role="search"].active')
            $form.find('input').val('');
            $form.removeClass('active');
        }

        // Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
        $(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
            event.preventDefault();
            var $form = $(this).closest('form'),
                $input = $form.find('input');
            $form.addClass('active');
            $input.focus();

        });
        // ONLY FOR DEMO // Please use $('form').submit(function(event)) to track from submission
        // if your form is ajax remember to call `closeSearch()` to close the search container
        $(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
            event.preventDefault();
            var $form = $(this).closest('form'),
                $input = $form.find('input');
            $('#showSearchTerm').text($input.val());
            closeSearch()
        });
    });

</script>



        <script>
            $(function(){

                // DECK LIST FIXED

                anchors.add('.has-anchor');

                $('[data-toggle="tooltip"]').tooltip()

window.setTimeout(function() {
if(location.hash.length !== 0) {
    window.scrollTo(window.scrollX, window.scrollY - 20);
}
}, 1); 

$('.anchorjs-link ').click(function(){
    $('html, body').animate({
        scrollTop: ($( $.attr(this, 'href') ).offset().top - 20)
    }, 500);
    return false;
});
                var wHeight = $(window).height();

                $(window).scroll(function(){
                    wHeight = $(window).height();                    
                });
                var $navbar = $('.navbar');
                var $navbarHasBigVersion = $navbar.data('has-big-version');
                $(window).scroll(function(){

                    if ($navbarHasBigVersion) {
                        var bodyTopDistance = getElementOffset('body', wHeight, 'top');
                        if (bodyTopDistance < -40) {
                            $('.navbar').addClass('navbar-small');
                            $('.navbar').removeClass('navbar-custom');
                        } else {
                            $('.navbar').removeClass('navbar-small');
                            $('.navbar').addClass('navbar-custom');
                        }
                    }

                    // var height = $(window).height();

                    // $deckList = $('.deck-list');

                    // var distance = getElementOffset('.deck-list', height, 'top');
                    // var footerDistance = getElementOffset('.footer', height, 'bottom');

                    // var unFix = false;

                    // if (footerDistance < 0) {
                    // }

                    // if (distance < 10) {
                    //     $deckList
                    //         .addClass('deck-list-fixed')
                    //         .removeClass('deck-list-unfixed')
                    //         .css({
                    //             'width': $deckList.parent().width() + 'px'
                    //         });
                    //     $deckList
                    //         .css('height', (height - 20) + 'px');
                    // }

                    // var coverDistance = getElementOffset('.deck-view-cover', height, 'top');
                    // console.log('distancia da deck view covver', coverDistance);
                    // if (coverDistance > 2) {
                    //     $deckList
                    //         .addClass('deck-list-unfixed')
                    //         .removeClass('deck-list-fixed');
                    // }

                    // console.log('Distancia do deck list para o topo', distance);

                    
                    // console.log('Distancia do footer para o topo', footerDistance);

                });
            });

            function getElementOffset(selector, height, position){
                var scroll = $(window).scrollTop();
                var elementOffset = $(selector).offset().top;
                
                var distanceToTop = (elementOffset - scroll);
                if (position == 'bottom') {
                    distanceToTop = (distanceToTop < 0) ? 0 : distanceToTop;
                    return (distanceToTop - height);
                }

                return distanceToTop;
            }
        </script>
        <script>
            $( function() {
                var url = 'https://omgvamp-hearthstone-v1.p.mashape.com/cards';
                var url = 'https://omgvamp-hearthstone-v1.p.mashape.com/cards/EX1_570';

                // $("a#element" ).defaultPluginName({
                //     imageSize: 500,
                //     endPoint: 'https://omgvamp-hearthstone-v1.p.mashape.com/cards/{id}?locale=ptBR',
                //     field: 'img',
                //     beforeSend: function(request) {
                //         var key = "MsGzaHtBCPmsh23JKgh4K8FNMl2Ap1uXfoyjsnOxBYFvYuhW49";
                //         request.setRequestHeader("X-Mashape-Key", key);
                //     }
                // });
            } );
        </script>

    </body>
</html>
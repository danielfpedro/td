<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Yrsa:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Vesper+Libre:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700" rel="stylesheet">
        
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

        <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?= $this->fetch('content') ?>

        <?= $this->Html->script('../lib/jquery/dist/jquery.min') ?>
        <?= $this->Html->script('../lib/bootstrap/dist/js/bootstrap.min') ?>
        
        <?= $this->Html->script('../lib/anchor-js/anchor.min') ?>

        <?= $this->fetch('script') ?>

        <script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>

        <script>
            $(function(){
                // AFFIX HOME
                $('.container-affix-home').css({
                    width: $('.container-affix-home').parent().width()
                });

                var affixHomeTop = $('.container-topo').height() + 450;
                var affixHomeBottom = 395;
                $('.container-affix-home').affix({
                    offset: {
                        top: affixHomeTop,
                        bottom: affixHomeBottom 
                    }
                });

                var wHeight = $(window).height();
                $(window).resize(function(){
                    wHeight = $(window).height();
                });
                // Alterna a navbar grande e menor

                var $navbar = $('.navbar');
                var $navbarHasBigVersion = $navbar.data('has-big-version');
                var navbarDistance = -40;
                setNavbarPosition();
                $(window).scroll(function(){
                    setNavbarPosition();
                });
                function setNavbarPosition()
                {
                    if ($navbarHasBigVersion) {
                        var bodyTopDistance = getElementOffset('body', wHeight, 'top');
                        if (bodyTopDistance < navbarDistance) {
                            $navbar.addClass('navbar-small');
                            $navbar.removeClass('navbar-custom');
                        } else {
                            $navbar.removeClass('navbar-small');
                            $navbar.addClass('navbar-custom');
                        }
                    }

                    $navbar.fadeIn(100);
                }

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
            });
        </script>

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

        $('.btn-navbar-search, .btn-navbar-search-close').click(function(){
            $('.navbar-hidden-search').fadeToggle();
            $('#q').val('').focus();
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

    </body>
</html>
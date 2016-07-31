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

        <?= $this->fetch('script') ?>

</script>

    </body>
</html>
<div class="topo-container">
<div class="container">
    <div class="row">
        <div class="col-md-4">
                       <form class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default navbar-search-submit">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                        <input type="search" class="form-control navbar-search-input" placeholder="Buscar...">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 text-center">
            <?= $this->Html->image('logo.png', ['width' => '220px']) ?>
        </div>
        <div class="col-md-4 text-right">
            <ul class="list-inline">
                <li>
                    <a href="#" class="text-primary">
                        <span class="fa fa-facebook"></span>
                    </a>
                </li> 
                <li>
                    <a href="#" class="text-danger">
                        <span class="fa fa-youtube-play"></span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="text-info">
                        <span class="fa fa-twitter"></span>
                    </a>
                </li>        
            </ul>
        </div>
    </div>
</div>
</div>
<nav class="navbar navbar-static-top navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?= $this->Html->image('logo.png', ['width' => '45px', 'style' => 'margin-top: -13px']) ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div >
                <ul class="nav navbar-nav" >
                    <li class=""><a href="#">Notícias</a></li>
                    <li><a href="#">Reportagens</a></li>
                    <li><a href="#">Programas</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">    Decks <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Guerreiro</a></li>
                            <li><a href="#">Mago</a></li>
                            <li><a href="#">Sacerdote</a></li>
                            <li><a href="#">Caçador</a></li>
                            <li><a href="#">Druida</a></li>
                            <li><a href="#">Ladino</a></li>
                            <li><a href="#">Paladino</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- <div class="topo-container">
    <div class="container">
        <div class="topo-wrap">
            <div class="topo-logo">
                <?= $this->Html->image('logo.png', ['width' => '100%']) ?>
            </div>
            <div class="topo-body">
                <div class="topo-body-buttons">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-youtube-play"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topo-body-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">
                                        Notícias
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        Guias
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#">Decks</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pesquisar">
                                <span class="input-group-btn">
                                    <button class="btn btn-default">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-static-top navbar-custom navbar-custom-big-font">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="#">Notícias</a></li>
                        <li><a href="#">Reportagens</a></li>
                        <li><a href="#">Programas</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">    Decks <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Guerreiro</a></li>
                                <li><a href="#">Mago</a></li>
                                <li><a href="#">Sacerdote</a></li>
                                <li><a href="#">Caçador</a></li>
                                <li><a href="#">Druida</a></li>
                                <li><a href="#">Ladino</a></li>
                                <li><a href="#">Paladino</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="navbar-right">
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default navbar-search-submit">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </div>
                                    <input type="search" class="form-control navbar-search-input" placeholder="Buscar...">
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
        
        <!-- <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?= $this->Html->image('logo.png', ['width' => '60px']) ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
        </div> -->
    <!--</div>
</nav> -->
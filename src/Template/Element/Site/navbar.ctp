<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            <?= $this->Html->image('logo.png', ['width' => '60px']) ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
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
<!--            <form class="navbar-form navbar-left">
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
            </form> -->
            <ul class="nav navbar-nav">
                <li style="margin-right: 10px;">
                    <a href="#" class="text-primary">
                        <span class="fa fa-search"></span>
                    </a>
                </li>
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
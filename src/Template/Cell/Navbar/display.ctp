<nav
    class="navbar navbar-fixed-top navbar-static-top navbar-default <?= ($hasBigVersion) ? 'navbar-custom' : 'navbar-small' ?>" 
    data-has-big-version="<?= $hasBigVersion ?>">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target="#navbar-collapse" >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php
                $image = $this->Html->image('logo.png');
                echo $this->Html->link($image, [
                    'controller' => 'Site',
                    'action' => 'home'
                ], [
                    'class' => 'navbar-brand',
                    'escape' => false
                ]);
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-main-menu">
                <?php foreach ($mainMenu as $key => $menuItem): ?>
                    <?php if (!isset($menuItem['items'])): ?>
                        <li>
                            <?= $this->Html->link($menuItem['label'], $menuItem['url']) ?>
                        </li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a
                                href="#"
                                class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button">
                                <?= $menuItem['label'] ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menuItem['items'] as $dropdownItem): ?>
                                    <?php if (is_array($dropdownItem)): ?>
                                        <li>
                                            <?= $this->Html->link($dropdownItem['label'], $dropdownItem['url']) ?>
                                        </li>
                                    <?php else: ?>
                                        <li role="separator" class="divider"></li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-extra-buttons">
                <li class="">
                    <form
                        action="<?= $this->Url->build(['action' => 'search']) ?>"
                        method="GET"
                        class="navbar-form navbar-hidden-search"
                        role="search">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Digite a sua pesquisa e aperte enter..."
                                autocomplete="off"
                                name="q"
                                id="q">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default btn-navbar-search-close">
                                    <span class="glyphicon glyphicon-remove">
                                        <span class="sr-only">Close</span>
                                    </span>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <li style="margin-right: 20px">
                    <a href="#" class="btn-navbar-search">
                        <span class="fa fa-search"></span>
                    </a>
                </li>
                <?php foreach ($socialNetworks as $socialNetwork): ?>
                    <li>
                        <a
                            href="<?= $socialNetwork['url'] ?>"
                            class="<?= $socialNetwork['class'] ?>"
                            target="_blank">
                            <span class="fa fa-<?= $socialNetwork['faIcon'] ?>"></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
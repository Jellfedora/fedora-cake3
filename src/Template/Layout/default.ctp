<?php
$cakeDescription = 'Valhalla';
?>
<!DOCTYPE html>
<html ng-app="App">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('font-awesome-4.7.0/css/font-awesome.min.css'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?= $this->Html->css('sass.css') ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.min.js"></script>
    <?= $this->Html->script('jquery.scrollex.min.js') ?>
    <?= $this->Html->script('angularjs/app.js') ?>
    <?= $this->Html->script('angularjs/controllers/MenuCtrl.js') ?>
</head>

<body ng-controller="appController">
    <div class="scrollex"></div>
    <!-- Récupére l'utilisateur connecté -->
    <?php
    $connected = $this->request->getSession()->read('Auth.User');
    $user_id = $this->request->getSession()->read('Auth.User.id');
    ?>
    <header class="header">
        <div ng-controller="menuController">
            <div class="menu-icon" id="toggleShowMenu" ng-click="toggleShowMenu()">
                <div class="icon_span"></div>
                <svg x="0" y="0" width="54px" height="54px" viewBox="0 0 54 54">
                    <path
                        d="M16.500,27.000 C16.500,27.000 24.939,27.000 38.500,27.000 C52.061,27.000 49.945,15.648 46.510,11.367 C41.928,5.656 34.891,2.000 27.000,2.000 C13.193,2.000 2.000,13.193 2.000,27.000 C2.000,40.807 13.193,52.000 27.000,52.000 C40.807,52.000 52.000,40.807 52.000,27.000 C52.000,13.000 40.837,2.000 27.000,2.000">
                    </path>
                </svg>
            </div>
            <div class="menu__block-title" style="display:none">
                <h1 class="menu__block-title__title">Valhalla</h1>
                <div class="menu__block-title__opacity">
                </div>
            </div>
            <div class="menu" ng-if="showMenu">
                <div class="menu__links">
                    <?php
                    echo $this->Html->link(
                        'Accueil',
                        array('controller' => 'Pages', 'action' => "display"),
                        ['class' => 'menu__links__link']
                    );
                    echo $this->Html->link(
                        'Articles',
                        array('controller' => 'Articles', 'action' => "index"),
                        ['class' => 'menu__links__link']
                    );
                    if ($connected) {
                        if ($user_id === 2) {
                            echo $this->Html->link(
                                'Bestiaire',
                                array('controller' => 'Soldiers', 'action' => "index"),
                                ['class' => 'menu__links__link']
                            );
                        }
                        echo $this->Html->link(
                            'Jouer',
                            array('controller' => 'Games', 'action' => 'play'),
                            ['class' => 'menu__links__link']
                        );
                        echo $this->Html->link(
                            'Profil',
                            array('controller' => 'Users', 'action' => 'edit', $user_id),
                            ['class' => 'menu__links__link']
                        );
                        echo $this->Html->link(
                            'Deconnexion',
                            array('controller' => 'Users', 'action' => 'logout'),
                            ['class' => 'menu__links__link']
                        );
                    } else {
                        echo $this->Html->link(
                            'Connexion',
                            array('controller' => 'Users', 'action' => 'login'),
                            ['class' => 'menu__links__link']
                        );
                    }
                    ?>
                </div>
            </div>
            <div class="menu__background" ng-if="showMenu"></div>
        </div>
    </header>
    <div style="min-height:100vh;">


        <?= $this->fetch('content') ?>
    </div>
</body>

</html>

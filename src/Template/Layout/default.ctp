<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

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
    <?= $this->Html->css('font-awesome-4.7.0/css/font-awesome.min.css'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-- Liens jquery (désactivés)-->
    <?php $this->Html->script('jquery-3.3.1.min') ?>
    <?php $this->Html->script('app') ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.7/angular.min.js"></script>
    <?= $this->Html->css('sass.css') ?>
    <!-- Animation lettre -->
    <?= $this->Html->script('textillatejs/jquery.lettering.js') ?>
    <?= $this->Html->script('textillatejs/jquery.textillate.js') ?>

    <?= $this->Html->script('angularjs/app.js') ?>
    <?= $this->Html->script('angularjs/controllers/MenuCtrl.js') ?>
    <?= $this->Html->script('angularjs/controllers/BattleCtrl.js') ?>
    <?= $this->Html->script('angularjs/controllers/FirstBattleCtrl.js') ?>
    <?= $this->Html->script('angularjs/controllers/SecondBattleCtrl.js') ?>
</head>

<body ng-controller="appController">

    <!-- Loader -->
    <div ng-hide="showContent" class="text-center" style="height:100%;overflow:hidden;position:absolute;top:0;right:0;left:0;bottom:0;background-color:#450000;z-index:900;padding-top:3em;">
        <div class="loader loader--style2" title="1">
            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                    <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
    </div>

    <!-- Récupére l'utilisateur connecté -->
    <?php
    $connected = $this->request->getSession()->read('Auth.User');
    $user_id = $this->request->getSession()->read('Auth.User.id');
    $username = $this->request->getSession()->read('Auth.User.username');
    $avatar = $this->request->getSession()->read('Auth.User.avatar');
    $connexion = $this->Html->link(
        'Connexion',
        ['controller' => 'Users', 'action' => 'login'],
        array('class' => 'nav-link text-light')
    );

    $deconnexion = $this->Html->link(
        'Déconnexion',
        ['controller' => 'Users', 'action' => 'logout'],
        array('class' => 'nav-link text-light'),
        ['confirm' => 'Etes vous sur de vouloir vous déconnecter?']
    );

    $edit_user = $this->Html->link(
        //$username,
        'Mon profil',
        ['controller' => 'Users', 'action' => 'edit', $user_id],
        array('class' => 'nav-link text-light')
    );
    ?>


    <div ng-controller="menuController">
        <button id="toggleShowMenu" ng-click="toggleShowMenu()">
            <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
        </button>

        <div class="site-title tlt" ng-if="!showMenu" style="color:white; font-weight:bold; text-transform:uppercase;font-size:1em;">
            <h1>Valhalla</h1>
        </div>
        <div class="menu" ng-if="showMenu">
            <div class="menu__links">
                <?= $this->Html->link(
                    $this->Html->image('icons/icon-home.png', array('alt' => "Accueil")),
                    array('controller' => 'Pages', 'action' => "display"),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
                ?>

                <?= $this->Html->link(
                    $this->Html->image('icons/icon-news.png', array('alt' => "Actualités")),
                    array('controller' => 'Articles', 'action' => "index"),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
                ?>

                <?php

                if ($connected) {
                    if ($user_id === 2) { ?>

                <?= $this->Html->link(
                    $this->Html->image('icons/icon-monster.png', array('alt' => "Jouer")),
                    array('controller' => 'Soldiers', 'action' => "index"),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
            } ?>

                <?= $this->Html->link(
                    $this->Html->image('icons/icon-sword.png', array('alt' => "Jouer")),
                    array('controller' => 'Games', 'action' => 'play'),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
                ?>

                <?= $this->Html->link(
                    $this->Html->image('icons/icon-user.png', array('alt' => "Profil")),
                    array('controller' => 'Users', 'action' => 'edit', $user_id),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                ); ?>

                <?= $this->Html->link(
                    $this->Html->image('icons/icon-logout.png', array('alt' => "Deconnexion")),
                    array('controller' => 'Users', 'action' => 'logout'),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
            } else {
                echo $this->Html->link(
                    $this->Html->image('icons/icon-login.png', array('alt' => "Connexion")),
                    array('controller' => 'Users', 'action' => 'login'),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
                ?>
                <?= $this->Html->link(
                    $this->Html->image('icons/icon-register.png', array('alt' => "Inscription")),
                    array('controller' => 'Users', 'action' => 'add'),
                    array(
                        'class' => 'menu__links-link',
                        'escape' => false
                    )
                );
            }
            ?>

            </div>
        </div>
    </div>
    <div style="min-height:100vh;">
        <?= $this->fetch('content') ?>

    </div>
    <footer class="home__footer text-light text-center">
        <small>Jellfedora Company - &copy; COPYRIGHT 2019 - Tout droits réservés</small>
    </footer>
</body>

</html>

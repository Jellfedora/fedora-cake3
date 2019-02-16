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
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css ('font-awesome-4.7.0/css/font-awesome.min.css'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery-3.3.1.min') ?>
    <?= $this->Html->script('app') ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?= $this->Html->css('fedora.css') ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
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
        $username,
        ['controller' => 'Users', 'action' => 'edit', $user_id],
        array('class' => 'nav-link text-light')
    );

    if ($connected) {


    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <h1><a class="navbar-brand text-light" href="./home"><?= $cakeDescription ?></a></h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link(
                        'Articles',
                        ['controller' => 'Articles', 'action' => 'index'],
                        array('class' => 'nav-link text-light')
                        ); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        'Recettes',
                        ['controller' => 'Recettes', 'action' => 'index'],
                        array('class' => 'nav-link text-light')
                    ); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(
                        'Combattants',
                        ['controller' => 'Soldiers', 'action' => 'index'],
                        array('class' => 'nav-link text-light')
                    ); ?>
                </li>
                <?php
                if (!$this->request->getSession()->read('Auth')) {
                    echo ('<li class ="nav-item active">' . $connexion .'</li>');
                }else {
                    echo ('<li class ="nav-item">' . $deconnexion . '</li>');
                }?>

            </ul>
        </div>
    </nav>
    <?php
    }
    ?>

    <?= $this->Flash->render() ?>
    <div class="text-light text-center bg-dark p-2">
            <?php
            if ($this->request->getSession()->read('Auth')) {
                echo '<img class="avatar" src="'.$avatar.'" alt=""> <br>';
                echo $edit_user;

            }
            ?>

        </div>
    <div class="container bg-light">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>

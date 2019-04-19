<?php $this->assign('title', 'Teddyversaire'); ?>
<?= $this->Html->script('angularjs/controllers/TeddyversaireCtrl.js') ?>

<div class="teddy" ng-controller="teddyversaireController">
    <h1 class="teddy__title">Joyeux Teddyversaire!!!</h1>
    <?= $this->Html->image(
                        'lol/teddy.jpg',
                        array('class' => 'teddy__image shake-constant shake-slow'),
                        array('alt' => "Un Teddy")
                    ); ?>
    <img class="teddy__gif" src="https://media.giphy.com/media/5tlq0pRndGu8U/giphy.gif" alt="" srcset="">
    <div class="teddy__text">
        <span class="teddy__text__gland">D'un petit gland naît un grand chêne</span>
        <p>Parce qu'un simple texto c'est carrément dépassé, moi je te fais une page web bienvenue dans le Teddyversaire
            2.0!</p>
        <p>Une pige de plus, un nouveau taf, bientôt Tonton c'est qu'on rajeunit pas hein!</p>
        <p>PS: Fais pas gaffe au reste du site, il est carrément pas finit mais c'est le seul qui est en ligne sur mon
            serveur </p>
        <p>PS2: Ca pique les yeux? C'est fait exprès!</p>
    </div>
</div>



<!-- Player audio -->
<audio class="d-none audio-player" src="../webroot/files/happy-birthday.mp3" controls id="happy-birthday"></audio>

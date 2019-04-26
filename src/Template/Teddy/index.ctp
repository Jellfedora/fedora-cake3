<?php $this->assign('title', 'Teddyversaire'); ?>
<?= $this->Html->script('angularjs/controllers/TeddyversaireCtrl.js') ?>

<div class="teddy" ng-controller="teddyversaireController">
    <button id="sound-button" class="teddy__play-button shake-chunk shake-constant" ng-click="play()">Tripote
        moi</button>
    <p class="teddy__small">Regarde ça sur mobile, sur pc ça rend carrément moins bien et active le son!</p>
    <div class="teddy__content d-none">
        <h1 class="teddy__content__title shake-rotate shake-constant">Joyeux Teddyversaire!!!</h1>
        <?= $this->Html->image(
            'lol/teddy-birthday.png',
            array('class' => 'teddy__content__image shake-constant shake-opacity'),
            array('alt' => "Un Teddy")
        ); ?>
        <div class="teddy__content__text shake-constant shake-slow">
            <span class="teddy__content__text__gland">D'un petit gland naît un grand chêne</span>
            <p>Parce qu'un simple texto c'est carrément dépassé, moi je te fais une page web bienvenue dans le
                Teddyversaire
                2.0!</p>
            <p>Une pige de plus, un nouveau taf, bientôt Tonton c'est qu'on rajeunit pas hein!</p>
            <p>Encore un Joyeux Anniversaire mon poulet, j'ai hâte de féter ça!</p>
            <p>On t'embrasse fort, reste comme tu es!</p>
            <p>PS: Fais pas gaffe au reste du site, il est carrément pas finit mais c'est le seul qui est en ligne sur
                mon
                serveur </p>
            <p>PS2: Ca pique les yeux? C'est fait exprès!</p>
            <p>PS3: On a finit d'aménager la cabane pour toi, tu t'installes quand tu veut!</p>
        </div>
        <img class="teddy__content__gif" src="https://media.giphy.com/media/5tlq0pRndGu8U/giphy.gif" alt="" srcset="">
    </div>
</div>
<div class="view-counter">
    <p>Cette page a été vue: <?= $counter_view; ?> fois</p>
</div>




<!-- Player audio -->
<audio class="d-none audio-player" src="../webroot/files/happy-birthday.mp3" controls id="happy-birthday"></audio>

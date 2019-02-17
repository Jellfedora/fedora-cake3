<div class="container-fluide text-light  text-center d-flex justify-content-around mt-5">

    <img id="fight-logo" class="d-none" src="../webroot/img/logo-fight.png" alt="">

    <div class="portraits bg-dark" id="player-two-portrait">
        <img class="fight-avatar" src="<?= $soldierTwo->avatar ?>" alt="">
        <h2 id="bossName"><?= $soldierTwo->name ?></h2>
        <p>Point de vie: <span id="j2-hp"><?= $soldierTwo->hp ?></span>/<span id="j2initiaux-hp"><?= $soldierTwo->hp ?></span></p>



        <div class="player-two-hp progress-bar green">
            <div class="player-two-hp-bar player-hp-bar"></div>
        </div>


        <p><img class="player-bar__icons" src="../webroot/img/icon-sword.png" alt=""> <span id="j2-power"><?= $soldierTwo->attaque ?></span></p>
    </div>

<!-- <p><?= $this->Html->link('Attaquer '. $soldierTwo->name, ['action' => 'battle']) ?></p> -->


</div>
<div class="container-fluide text-center text-danger">
    <span id="message"></span>
</div>


<div class="player-bar text-center text-light">
    <div class="player-bar__avatar">
        <img class="player-bar__avatar" src="<?= $soldierOne->avatar ?>" alt="">
    </div>
    <div class="player-bar__stats text-center">
        <p><img class="player-bar__icons" src="../webroot/img/icon-level.png" alt="">  1</span></p>
        <p><img class="player-bar__icons" src="../webroot/img/icon-sword.png" alt="">  <span id="j1-power"><?= $soldierOne->attaque ?></span></p>
        <p><img class="player-bar__icons" src="../webroot/img/icon-potion.png" alt="">  <span id="j1-potion"><?= $soldierOne->potion ?></span></p>
    </div>
    <div class="player-bar__skills text-center">
        <input class="player-bar__skills__button" id="j2-attaque" type="button" value="Attaquer <?= $soldierOne->name ?>">
        <input class="player-bar__skills__button" id="j1-attaque" type="button" value="Attaquer">
        <input class="player-bar__skills__button" id="j1-use-potion" type="button" value="Potion de soin">
    </div>
    <div class="player-bar__life text-center">
        <h2 id="playerName"><?= $soldierOne->name ?></h2>
        <p>Point de vie: <span id="j1-hp"><?= $soldierOne->hp ?></span>/<span id="j1initiaux-hp"><?= $soldierOne->hp ?></span></p>
        <div class="player-one-hp progress-bar green">
            <div class="player-one-hp-bar player-hp-bar"></div>
        </div>
    </div>
    <div class="player-bar__menu text-center">
        <input class="player-bar__menu__button" id="reload-fight" type="button" value="Recommencer">
        <input class="player-bar__menu__button" id="auto" type="button" value="Combat Automatique">
        <input class="player-bar__menu__button" id="sound-player" type="button" value="Couper la Musique">
    </div>
</div>


<!-- Lecteurs audio -->
<audio class="d-none audio-player" src="../webroot/files/battle-Two-steps-from-hell-victory.mp3" controls id="player-battle"></audio>
<audio class="d-none audio-player" src="../webroot/files/victory.mp3" controls id="player-victory"></audio>
<audio class="d-none audio-player" src="../webroot/files/game-over.mp3" controls id="game-over"></audio>
<audio class="d-none audio-player" src="../webroot/files/low-life-pokemon.mp3" controls id="low-life"></audio>

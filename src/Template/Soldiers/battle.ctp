<div class="container-fluide text-light  text-center d-flex justify-content-around mt-5">
    <div class="portraits bg-dark" id="player-one-portrait">
        <img class="fight-avatar" src="<?= $soldierOne->avatar ?>" alt="">
        <h2 id="playerName"><?= $soldierOne->name ?></h2>
        <p>Point de vie: <span id="j1-hp"><?= $soldierOne->hp ?></span></p>
        <span id="j1initiaux-hp" class="d-none"><?= $soldierOne->hp ?></span>
        <div class="player-one-hp progress-bar green">
            <div class="player-one-hp-bar player-hp-bar"></div>
        </div>
        <p>Attaque: <span id="j1-power"><?= $soldierOne->attaque ?></span></p>
        <p>Potion: <span id="j1-potion"><?= $soldierOne->potion ?></span></p>
    </div>

    <img id="fight-logo" class="d-none" src="../webroot/img/logo-fight.png" alt="">

    <div class="portraits bg-dark" id="player-two-portrait">
        <img class="fight-avatar" src="<?= $soldierTwo->avatar ?>" alt="">
        <h2 id="bossName"><?= $soldierTwo->name ?></h2>
        <p>Point de vie: <span id="j2-hp"><?= $soldierTwo->hp ?></span></p>
        <span id="j2initiaux-hp" class="d-none"><?= $soldierTwo->hp ?></span>


        <div class="player-two-hp progress-bar green">
            <div class="player-two-hp-bar player-hp-bar"></div>
        </div>


        <p>Attaque: <span id="j2-power"><?= $soldierTwo->attaque ?></span></p>
    </div>

<!-- <p><?= $this->Html->link('Attaquer '. $soldierTwo->name, ['action' => 'battle']) ?></p> -->


</div>
<div class="container-fluide text-center text-danger">
    <span id="message"></span>
</div>
<div class="container-fluide text-center mt-5">
    <input class="btn btn-dark" id="j2-attaque" type="button" value="Attaquer <?= $soldierOne->name ?>">
    <input class="btn btn-dark" id="j1-attaque" type="button" value="Attaquer">
    <input class="btn btn-dark" id="j1-use-potion" type="button" value="Potion de soin">
</div>

<div class="text-center mt-2">
    <button class="btn btn-secondary" id="reload-fight">Recommencer</button>
    <button class="btn btn-secondary" id="auto">Combat auto</button>
    <button class="btn btn-secondary" id="sound-player">Couper le son</button>
</div>

<!-- Lecteurs audio -->
<audio class="d-none audio-player" src="../webroot/files/battle-boss-ff8.mp3" controls id="player-battle"></audio>
<audio class="d-none audio-player" src="../webroot/files/victory.mp3" controls id="player-victory"></audio>
<audio class="d-none audio-player" src="../webroot/files/game-over.mp3" controls id="game-over"></audio>
<audio class="d-none audio-player" src="../webroot/files/low-life-pokemon.mp3" controls id="low-life"></audio>

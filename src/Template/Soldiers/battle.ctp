<!--
<div class="battle container-fluide text-light text-center" ng-controller="battleController" >


    <input type="button" value=" BattleMenu" ng-click="toggleShowBattleMenu()">


    <div class="battle__menu text-center" ng-if="showBattleMenu">
        <span id="reload-fight"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></span>
        <span id="auto"><i class="fa fa-bed fa-2x" aria-hidden="true"></i></i></span>
        <span id="sound-player"><i class="fa fa-volume-off fa-2x" aria-hidden="true"></i></span>
    </div>

    <div class="portraits bg-dark" id="player-two-portrait">
        <h2 id="bossName"><?= $soldierTwo->name ?></h2>
        <img class="fight-avatar mb-3" src="<?= $soldierTwo->avatar ?>" alt="">
        <p><span id="j2-hp"><?= $soldierTwo->hp ?></span>/<span id="j2initiaux-hp"><?= $soldierTwo->hp ?></span></p>



        <div class="player-two-hp progress-bar green">
            <div class="player-two-hp-bar player-hp-bar"></div>
        </div>


        <p>
            <?= $this->Html->image('icon-sword.png',
                array('class'=> 'player-bar__icons'),
                array('alt' => "Texte alternatif"));
            ?>
             <span id="j2-power"><?= $soldierTwo->attaque ?></span>
        </p>
    </div>

<?= $this->Html->link('Attaquer '. $soldierTwo->name, ['action' => 'battle']) ?>
</div>

<div class="container-fluide text-center text-danger">
    <span id="message"></span>
</div>


<div class="player-bar text-center text-light">
    <div class="player-bar__avatar">
        <img class="player-bar__avatar" src="<?= $soldierOne->avatar ?>" alt="">
    </div>
    <div class="player-bar__life text-center">
        <h2 id="playerName"><?= $soldierOne->name ?></h2>
        <span id="j1-hp"><?= $soldierOne->hp ?></span>/<span id="j1initiaux-hp"><?= $soldierOne->hp ?></span>
        <div class="player-one-hp progress-bar green">
            <div class="player-one-hp-bar player-hp-bar"></div>
        </div>
    </div>
    <div class="player-bar__stats text-center">
        <p>
            <?= $this->Html->image(
                'icon-level.png',
                array('class' => 'player-bar__icons'),
                array('alt' => "Texte alternatif")
            );
            ?>
            <span> 1</span>
        </p>
        <p>
            <?= $this->Html->image(
                'icon-sword.png',
                array('class' => 'player-bar__icons'),
                array('alt' => "Texte alternatif")
            );
            ?>
            <span id="j1-power"><?= $soldierOne->attaque ?></span>
        </p>
        <p>
            <?= $this->Html->image(
                'icon-potion.png',
                array('class' => 'player-bar__icons'),
                array('alt' => "Texte alternatif")
            );
            ?>
            <span id="j1-potion"><?= $soldierOne->potion ?></span>
        </p>
    </div>


</div>

<div class="player-bar__skills text-center">
    <input class="player-bar__skills__button attack-input" id="j2-attaque" type="button" value="Attaquer <?= $soldierOne->name ?>">
    <input class="player-bar__skills__button attack-input" id="j1-attaque" type="button" value="Attaque">
    <input class="player-bar__skills__button attack-input" id="j1-use-potion" type="button" value="Soin">
    <input class="player-bar__skills__button attack-input" id="j1-scan" type="button" value="Scan">
</div>


<audio class="d-none audio-player" src="../../webroot/files/battle-wontolla-are-you-with-us.mp3" controls id="player-battle"></audio>
<audio class="d-none audio-player" src="../../webroot/files/victory.mp3" controls id="player-victory"></audio>
<audio class="d-none audio-player" src="../../webroot/files/game-over.mp3" controls id="game-over"></audio>
<audio class="d-none audio-player" src="../../webroot/files/low-life-pokemon.mp3" controls id="low-life"></audio> -->



<!-- Nouveau battle.ctp -->


<div class="battle container-fluide text-light text-center" ng-controller="battleController" >

    <!-- Menu partie -->
    <div class="battle__options text-center container" ng-if="showBattleMenu">
        <span class="battle__options-options" id="close"><i class="fa fa-times fa-2x" aria-hidden="true" ng-click="toggleShowBattleMenu()"></i></span>
        <span class="battle__options-options" id="reload-fight"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></span>
        <span class="battle__options-options" id="auto"><i class="fa fa-bed fa-2x" aria-hidden="true"></i></i></span>
        <span class="battle__options-options" id="sound-player"><i class="fa fa-volume-off fa-2x" aria-hidden="true"></i></span>
    </div>

    <!-- Plateau de jeu -->
    <div class="battle__players">
        <div class="battle__players-bar__player-one text-left">
            <div class="battle__players-bar__player-one__name">
                <span id="playerOneName"><?= $soldierOne->name ?></span>
            </div>
            <div class="battle__players-bar__player-one__life text-left">
                <p><span id="j1-hp"><?= $soldierOne->hp ?></span>/<span id="j1initiaux-hp"><?= $soldierOne->hp ?></span></p>
                <div class="player-one-hp progress-bar green">
                    <div class="player-one-hp-bar player-hp-bar"></div>
                </div>
            </div>
            <div class="battle__players-bar__player-one__stats">
                <div class="battle__players-bar__player-one__stats-stats">
                    <span>lvl 1</span>
                </div>
                <div class="battle__players-bar__player-one__stats-stats">
                    <span id="j1-power"><?= $soldierOne->attaque ?></span>
                </div>
                <div class="battle__players-bar__player-one__stats-stats">
                    <span id="j1-potion"><?= $soldierOne->potion ?></span>
                </div>
            </div>
        </div>
        <div class="battle__players-bar__player-two text-right">
            <div class="battle__players-bar__player-two__name">
                <span id="playerTwoName"><?= $soldierTwo->name ?></span>
            </div>
            <div class="battle__players-bar__player-two__life text-right">
                <p><span id="j2-hp"><?= $soldierTwo->hp ?></span>/<span id="j2initiaux-hp"><?= $soldierTwo->hp ?></span></p>
                <div class="player-two-hp progress-bar green">
                    <div class="player-two-hp-bar player-hp-bar"></div>
                </div>
            </div>
            <div class="battle__players-bar__player-two__stats">
                <div class="battle__players-bar__player-two__stats-stats">
                    <span>lvl 1</span>
                </div>
                <div class="battle__players-bar__player-two__stats-stats">
                    <span id="j2-power"><?= $soldierTwo->attaque ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="battle__map">
            <div class="battle__map__player-one-avatar">
                    <img id="playerOneAvatar" class="battle__map__player-one-avatar__avatar" src="<?= $soldierOne->avatar ?>" alt="">
            </div>
            <div class="battle__map__player-two-avatar">
                    <img id="playerTwoAvatar" class="battle__map__player-two-avatar__avatar" src="<?= $soldierTwo->avatar ?>" alt="">
            </div>
    </div>
    <div class="battle__menu">
        <div class="battle__menu__tools">
            <span class="battle__menu__tools-tools"><i class="fa fa-cog fa-2x" aria-hidden="true" ng-click="toggleShowBattleMenu()"></i></span>
            <!-- <input class="battle__menu__tools-tools" type="button" value=" Menu" ng-click="toggleShowBattleMenu()"> -->
        </div>
        <div class="battle__menu__skills">
            <span class="battle__menu__tools-tools"><i class="fas fa-claw-marks fa-2x" aria-hidden="true" ></i></span>
            <input class="battle__menu__skills-skills attack-input" type="button" value="att" id="j1-attaque">
            <input class="battle__menu__skills-skills attack-input" type="button" value="soi" id="j1-use-potion">
            <input class="battle__menu__skills-skills attack-input" type="button" value="mag" id="j1-scan">
            <input class="battle__menu__skills-skills attack-input" type="button" value="cmp" id="j1-competences">
        </div>
    </div>
</div>

<!-- Player audio -->
<audio class="d-none audio-player" src="../../webroot/files/battle-wontolla-are-you-with-us.mp3" controls id="player-battle"></audio>
<audio class="d-none audio-player" src="../../webroot/files/victory.mp3" controls id="player-victory"></audio>
<audio class="d-none audio-player" src="../../webroot/files/game-over.mp3" controls id="game-over"></audio>
<audio class="d-none audio-player" src="../../webroot/files/low-life-pokemon.mp3" controls id="low-life"></audio>

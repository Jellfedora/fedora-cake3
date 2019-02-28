<div class="battle container-fluide text-light text-center" ng-controller="battleController" ng-init="loadHero()">

    <!-- Menu partie -->
    <div class="battle__options text-center" ng-hide="!showBattleMenu">
        <span class="battle__options-options" id="close"><i class="fa fa-times fa-2x" aria-hidden="true" ng-click="toggleHideBattleMenu()"></i></span>
        <span class="battle__options-options"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i>
        <!-- TODO régler l'affichage du lien -->
        <?= $this->Html->link(
                        'ici',
                        ['controller' => 'Games', 'action' => 'secondFight']
                    );
                ?></span>
        <span class="battle__options-options" id="auto"><i class="fa fa-bed fa-2x" aria-hidden="true"></i></i></span>
        <span class="battle__options-options" id="sound-player"><i class="fa fa-volume-off fa-2x" aria-hidden="true" ng-click="stopMusic()"></i></span>
    </div>

    <!-- Message Victoire / Defaite -->
    <div class="battle__win d-none" id="message-win">
        <span class="battle__win-win" ><p>Victoire !</p></span>
        <p>{{ lvlmessage }}</p>
        <button><?= $this->Html->link(
                        'Prochain ennemi?',
                        ['controller' => 'Games', 'action' => 'thirdFight'],
                        array('class' => 'nav-link text-light')
                    );
                ?>
        </button>
    </div>
    <div class="battle__loose d-none" id="message-loose">
        <span class="battle__loose-loose"><p>Defaite !</p></span>
        <button><?= $this->Html->link(
                        'Retourner affronter Queklain?',
                        ['controller' => 'Games', 'action' => 'firstFight'],
                        array('class' => 'nav-link text-light')
                    );
                ?>
        </button>
    </div>

    <!-- Plateau de jeu -->
    <div class="battle__players">
        <div class="battle__players-bar__player-one text-left">
            <div class="battle__players-bar__player-one__name">
                <span id="playerOneName">
                    {{hero_name}}</span>
            </div>
            <div class="battle__players-bar__player-one__life text-left">
                <p>
                    <span id="j1-hp">{{hero_hp}}</span>
                    /
                    <span id="j1initiaux-hp"> {{hero_hp_init}}</span>
                </p>
                <div class="player-one-hp progress-bar green">
                    <div class="player-one-hp-bar player-hp-bar"></div>
                </div>
            </div>
            <div class="battle__players-bar__player-one__stats">
                <div class="battle__players-bar__player-one__stats-stats">
                    <span>{{hero_level}}</span>
                </div>
                <div class="battle__players-bar__player-one__stats-stats">
                    <span id="j1-power">
                        {{hero_attaque}}</span>
                </div>
                <div class="battle__players-bar__player-one__stats-stats">
                    <span id="j1-potion">
                        {{hero_potion}}</span>
                </div>
            </div>
        </div>
        <div class="battle__players-bar__player-two text-right">
            <div class="battle__players-bar__player-two__name">
                <span id="playerTwoName">
                    <?= $soldier->name ?></span>
            </div>
            <div class="battle__players-bar__player-two__life text-right">
                <p><span id="j2-hp">
                        <?= $soldier->hp ?></span>/<span id="j2initiaux-hp">
                        <?= $soldier->hp ?></span></p>
                <div class="player-two-hp progress-bar green">
                    <div class="player-two-hp-bar player-hp-bar"></div>
                </div>
            </div>
            <div class="battle__players-bar__player-two__stats">
                <div class="battle__players-bar__player-two__stats-stats">
                    <span>lvl 1</span>
                </div>
                <div class="battle__players-bar__player-two__stats-stats">
                    <span id="j2-power">
                        <?= $soldier->attaque ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="battle__map">
        <div class="battle__map__player-one-avatar">
            <span class="battle__map__player-one-avatar-degat" id="playerOneLifeDegat"><p></p></span>
            <!-- <img id="playerOneAvatar" class="battle__map__player-one-avatar__avatar" src="<?= $soldierOne->avatar ?>" alt=""> -->

            <div class="sprites" id="playerOneAvatar"></div>
            <div class="sprites-attack d-none"></div>
            <div class="weapons d-none"></div>
        </div>
        <div class="battle__map__player-two-avatar">
            <span class="battle__map__player-two-avatar-degat" id="playerTwoLifeDegat"><p></p></span>
            <!-- <img id="playerTwoAvatar" class="battle__map__player-two-avatar__avatar" src="<?= $soldierTwo->avatar ?>" alt=""> -->
            <div class="sprites-boss-malboro" id="playerTwoAvatar"></div>
        </div>
    </div>
    <div class="battle__menu">
        <div class="battle__menu__tools">
            <button class="battle__menu__tools-tools"><i class="fa fa-cog fa-2x" aria-hidden="true" ng-click="toggleShowBattleMenu()"></i></button>
        </div>
        <div class="battle__menu__skills">
            <button class="battle__menu__skills-skills attack-input" id="j1-attaque" ng-click="playerOneAttack()" ng-hide="hideMagicMenu">
                <?= $this->Html->image(
                    'icon-sword.png',
                    array('class' => ''),
                    array('alt' => "Attaque")
                );?>
            </button>
            <button class="battle__menu__skills-skills attack-input" id="j1-use-potion" ng-hide="hideMagicMenu">
                <?= $this->Html->image(
                    'icon-potion.png',
                    array('class' => ''),
                    array('alt' => "Soin")
                );?>
            </button>
            <button class="battle__menu__skills-skills attack-input" id="j1-block" ng-click="playerOneBlock()" ng-hide="hideMagicMenu">
                <?= $this->Html->image(
                    'icon-shield.png',
                    array('class' => ''),
                    array('alt' => "Shield")
                );?>
            </button>
            <button class="battle__menu__skills-skills attack-input" id="j1-ice" ng-hide="!hideMagicMenu">
                <?= $this->Html->image(
                    'icon-ice.png',
                    array('class' => ''),
                    array('alt' => "Ice")
                );?>
            </button>
            <button class="battle__menu__skills-skills attack-input" id="j1-electric" ng-hide="!hideMagicMenu">
                <?= $this->Html->image(
                    'icon-electric.png',
                    array('class' => ''),
                    array('alt' => "Electric")
                );?>
            </button>
            <button class="battle__menu__skills-skills attack-input" id="j1-fire" ng-hide="!hideMagicMenu">
                <?= $this->Html->image(
                    'icon-fire.png',
                    array('class' => ''),
                    array('alt' => "Fire")
                );?>
            </button>
            <button class="battle__menu__skills-skills" id="j1-return" ng-hide="!hideMagicMenu" ng-click="toggleHideMagicMenu()">
                <?= $this->Html->image(
                    'icon-return.png',
                    array('class' => ''),
                    array('alt' => "Return")
                );?>
            </button>

            <button class="battle__menu__skills-skills" id="j1-show-magic-menu" ng-click="toggleShowMagicMenu()" ng-hide="hideMagicMenu">
                <?= $this->Html->image(
                    'icon-magic.png',
                    array('class' => ''),
                    array('alt' => "Compétences")
                );?>
            </button>
        </div>
    </div>
</div>

<!-- Player audio -->
<audio class="d-none audio-player" src="../webroot/files/battle-wontolla-are-you-with-us.mp3" controls id="battle"></audio>
<audio class="d-none audio-player" src="../webroot/files/victory.mp3" controls id="player-victory"></audio>
<audio class="d-none audio-player" src="../webroot/files/game-over.mp3" controls id="game-over"></audio>
<audio class="d-none audio-player" src="../webroot/files/low-life-pokemon.mp3" controls id="low-life"></audio>
<audio class="d-none audio-player" src="../webroot/files/fail.mp3" controls id="fail"></audio>
<audio class="d-none audio-player" src="../webroot/files/sword.mp3" controls id="sword"></audio>
<audio class="d-none audio-player" src="../webroot/files/sword2.mp3" controls id="sword2"></audio>

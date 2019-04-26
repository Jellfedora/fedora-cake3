<div class="heroes-view text-center text-light bg-drak">
    <h1>
        <?= ($hero->name) ?>
    </h1>

    <p>Hp:
        <?= ($hero->hp) ?>
    </p>
    <p>Attaque:
        <?= ($hero->attaque) ?>
    </p>
    <p>Potions en stock:
        <?= ($hero->potion) ?>
    </p>

    <p><small>Créé le :
            <?= $hero->created->format(DATE_RFC850) ?> par
            <?= $hero->user_id ?></small></p>


    <button>
        <?= $this->Html->link(
            'Jouer?',
            ['controller' => 'Games', 'action' => 'play'],
            array('class' => 'nav-link text-light')
        );
        ?>
    </button>
</div>

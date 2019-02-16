<h1><?= ($soldier->name) ?></h1>

<p>Hp: <?= ($soldier->hp) ?></p>
<p>Attaque: <?= ($soldier->attaque) ?></p>
<p>Vivant: <?php if ($soldier->alive = true) {
                echo ('Oui');
            } else {
                echo ('Non');
            } ?></p>


<p><small>Créé le : <?= $soldier->created->format(DATE_RFC850) ?> par <?= $soldier->user_id ?></small></p>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $soldier->slug]) ?></p>

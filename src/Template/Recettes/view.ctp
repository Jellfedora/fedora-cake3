<h1><?= h($recette->title) ?></h1>
<img class="" src="<?= $recette->photo ?>" alt="">
<h2>Recette:</h2>
<p><?= h($recette->body) ?></p>
<h2>Prix</h2>
<p><?= $recette->price ?></p>
<h2>Ingrédients:</h2>
<h2>Temps de préparation</h2>
<p><?= $recette->time ?></p>

<p><small>Créé le : <?= $recette->created->format(DATE_RFC850) ?> par <?= $recette->user_id ?></small></p>
<p><?= $this->Html->link('Modifier', ['action' => 'edit', $recette->slug]) ?></p>

<!-- Fichier : src/Template/Articles/view.ctp -->
<div class="container-fluide bg-dark text-light text-center mt-5">
    <h1><?= h($article->title) ?></h1>
    <p><?= h($article->body) ?></p>
    <p><small>Créé le : <?= $article->created->format(DATE_RFC850) ?></small></p>
    <p><?= $this->Html->link('Modifier', ['action' => 'edit', $article->slug]) ?></p>
</div>

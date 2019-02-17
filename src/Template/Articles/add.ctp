<!-- Fichier : src/Template/Articles/add.ctp -->
<div class="container-fluide bg-dark text-light text-center mt-5">
    <h1>Ajouter un article</h1>
    <?php
    echo $this->Form->create($article);
    //echo $this->Form->control('tag_string', ['type' => 'text']);
    //echo $this->Form->control('tags._ids', ['options' => $tags]);
    echo $this->Form->control('title', [
        'required' => true,
        'label' => 'Titre',
    ]);
    echo $this->Form->control('body', [
        'label' => 'Description',
        'required' => true,
        'rows' => '3'
    ]);
    echo $this->Form->button(__('Sauvegarder l\'article'));
    echo $this->Form->end();
    ?>
</div>

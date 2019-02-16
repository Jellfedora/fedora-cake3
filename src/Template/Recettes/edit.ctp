<h1>Modifier une recette</h1>


<?php
echo $this->Form->create($recette);
echo $this->Form->control('user_id', ['type' => 'hidden']);
echo $this->Form->control('title', [
    'required' => true,
    'label' => 'Titre',
]);
echo $this->Form->control('photo');
echo $this->Form->control('body', [
    'label' => 'Description',
    'required' => true,
    'rows' => '3'
]);
echo $this->Form->control('price');
echo $this->Form->control('time', [
    'required' => true,
    'label' => 'Temps de préparation'
]);
echo $this->Form->button(__('Sauvegarder la recette'));
echo $this->Form->end();
?>

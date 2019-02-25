<div class="text-center text-light bg-dark">
    <h1>Créer mon héros</h1>
    <?php
    echo $this->Form->create($hero);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('slug', ['type' => 'hidden']);
    echo $this->Form->control('name', [
        'required' => true,
        'label' => 'Nom de mon heros!',
    ]);

    echo $this->Form->button(__('Valider'));
    echo $this->Form->end();
    ?>
</div>

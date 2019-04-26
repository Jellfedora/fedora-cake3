<div class="heroes-add text-center text-light">
    <div class="heroes-add__block-title">
        <h1>Créer mon héros</h1>
    </div>
    <div class="heroes-add__form">
        <?php
    echo $this->Form->create($hero, [
        'class'=> 'heroes-add__form__form-content'
    ]);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('slug', ['type' => 'hidden']);
    echo $this->Form->control('name', [
        'required' => true,
        'label' => 'Quel est le nom de votre héros?',
        'class' => 'heroes-add__form__input-name'
    ]);

    echo $this->Form->button(__('Valider'),[
        'class'=>'heroes-add__form__form-content__submit'
    ]);
    echo $this->Form->end();
    ?>
    </div>
</div>

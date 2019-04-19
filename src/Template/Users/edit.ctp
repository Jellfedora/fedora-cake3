<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$user_id = $this->request->getSession()->read('Auth.User.id');
/**
 * TODO
 * Interdire la page si pas sur son compte!!!
 */

?>

<div class="form-user-edit">
    <h2 class="form-user-edit__title">Mon compte</h2>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <?php if ($user_id === 2) { ?>
            <li><?= $this->Html->link(__('Liste de mes articles'), ['controller' => 'Articles', 'action' => 'index']) ?>
            </li>
            <li><?= $this->Html->link(__('Ecrire un nouvel article'), ['controller' => 'Articles', 'action' => 'add']) ?>
            </li>
            <?php
        } ?>
        </ul>
    </nav>
    <div class="form-user-edit__block">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Modifier mes informations') ?></legend>
            <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('username');
            echo $this->Form->control('avatar');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        <p><?= $this->Form->postLink(
                    __('Supprimer mon compte et toutes mes données définitivement'),
                    ['action' => 'delete', $user->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
                )
                ?></p>
    </div>
</div>

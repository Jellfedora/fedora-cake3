<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
    </ul>
</nav> -->

<div class="">
    <div class="login-form text-center" style="padding-top:2.5em;">
        <h1>Inscription</h1>
        <?= $this->Form->create($user) ?>
        <input class="form-control form-inputs" type="email" name="email" id="email" placeholder="Votre adresse e-mail" autofocus required="required" maxlength="255">
        <input class="form-control form-inputs" type="password" name="password" id="password" placeholder="Votre mot de passe" required="required">
        <button type="submit" class="btn btn-light">Valider</button>
        <?= $this->Form->end() ?>
    </div>
</div>

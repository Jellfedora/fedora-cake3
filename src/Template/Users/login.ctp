<div class="text-center">
    <h1>Welcome</h1>
    <?= $this->Form->create() ?>
    <input class="form-control form-inputs" type="email" name="email" id="email" placeholder="Votre adresse e-mail" autofocus>
    <input class="form-control form-inputs" type="password" name="password" id="password" placeholder="Votre mot de passe">
    <button type="submit" class="btn btn-light">Valider</button>
    <?= $this->Form->end() ?>
</div>



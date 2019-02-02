<div class=" container-fluid text-center mt-5 text-light bg-dark p-4">
    <h1>Halte!</h1>
    <p>Tout le contenu de ce site est privé et hautement confidentiel!</p>
    <p>Si vous n'avez pas été invité par Dame Val d'Alsace, la reine aux trois dogos,<br>
    celle qui a vaincu le mâle, l'éleveuse de Gueguettes, la porteuse de l'étalon qui domminera la Charentes Libre<br>
    vous êtes priés de déguerpir immédiatement!</p>

    <?= $this->Form->create() ?>
    <input class="form-control" type="email" name="email" id="email" placeholder="Votre adresse e-mail">
    <input class="form-control" type="password" name="password" id="password" placeholder="Votre mot de passe">
    <button type="submit" class="btn btn-light">Valider</button>
    <?= $this->Form->end() ?>
</div>



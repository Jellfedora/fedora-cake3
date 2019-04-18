<div class="login-form" ng-model="toggleForm">
    <?= $this->Flash->render() ?>

    <div class="login-form__block animate-if" ng-if="!toggleForm">
        <h2 class="login-form__block__title">Connexion</h2>
        <div class="login-form__block__login text-center">
            <?= $this->Form->create() ?>
            <label class="login-form__block__login__labels pull-left" for="email">Votre adresse email</label>
            <input class="login-form__block__login__fields form-control form-inputs" type="email" name="email"
                id="email" placeholder="Votre adresse e-mail" autofocus>
            <label class="login-form__block__login__labels pull-left" for="password">Votre mot de passe</label>
            <input class="login-form__block__login__fields form-control form-inputs" type="password" name="password"
                id="password" placeholder="Votre mot de passe">
            <button type="submit" class="login-form__block__login__submit btn btn-light">Connexion</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="login-form__switch text-center" ng-show="!toggleForm">
        <button class="btn btn-light login-form__switch__button" ng-click="toggleForm=true">Pas de compte?
            Inscrivez-vous!</button>
    </div>


    <div class="login-form__block animate-if" ng-if="toggleForm">
        <h2 class="login-form__block__title">Inscription</h2>
        <div class="login-form__block__login text-center">
            <?= $this->Form->create($user, ['url' => ['controller' => 'Users', 'action' => 'add']]) ?>
            <label class="login-form__block__login__labels pull-left" for="username">Votre nom d'utilisateur</label>
            <input class="login-form__block__login__fields form-control form-inputs" type="text" name="username"
                id="username-add" placeholder="Votre nom d'utilisateur" autofocus required="required" maxlength="50">
            <label class="login-form__block__login__labels pull-left" for="email">Votre adresse email</label>
            <input class="login-form__block__login__fields form-control form-inputs" type="email" name="email"
                id="email-add" placeholder="Votre adresse e-mail" autofocus required="required" maxlength="255">
            <label class="login-form__block__login__labels pull-left" for="password">Votre mot de passe</label>
            <input class="login-form__block__login__fields form-control form-inputs" type="password" name="password"
                id="password-add" placeholder="Votre mot de passe" required="required">
            <button type="submit" class="login-form__block__login__submit btn btn-light">Inscription</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="login-form__switch text-center" ng-show="toggleForm">
        <button class="btn btn-light login-form__switch__button" ng-click="toggleForm=false">Vous avez déjà un
            compte?
            Connectez-vous!</button>
    </div>
</div>

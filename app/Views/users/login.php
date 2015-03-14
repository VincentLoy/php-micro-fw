<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants incorrects
    </div>
<?php endif; ?>
<div class="row">
    <h1 class="text-center">Connectez vous</h1>
    <div class="col-xs-12 col-sm-4 col-sm-offset-4">
        <form method="post">
            <?= $form->input('username', "Nom d'utilisateur"); ?>
            <?= $form->input('password', "Mot de passe", "password"); ?>
            <?= $form->submit("Se connecter", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
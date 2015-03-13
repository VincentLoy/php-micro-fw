<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:26
 */

use Core\Auth\DBAuth;

if(!empty($_POST)) {
    $auth = new DBAuth(App::getInstance()->getDb());
    if($auth->login($_POST['username'], $_POST['password'])) {

        header("Location: admin.php");

    }
    else {
        ?>
        <div class="alert alert-danger">
            Identifiants incorrect
        </div>
        <?php
    }
}

$form = new \Core\HTML\BootstrapForm($_POST);
?>

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
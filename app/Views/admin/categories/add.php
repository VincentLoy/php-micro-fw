<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:26
 */

use Core\HTML\BootstrapForm;

$categoriesTable = App::getInstance()->getTable('Category');

if(!empty($_POST)) {
    $result = $categoriesTable->create([
        'title' => $_POST['title'],
    ]);

    if($result) {
       header('Location: admin.php?page=categories.edit&id='.App::getInstance()->getDb()->lastInsertId());
    }
}

$form = new BootstrapForm($_POST);
?>

<div class="row">
    <h1 class="text-center">Ajouter une catégorie</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form method="post">
            <?= $form->input('title', "Titre de la catégorie"); ?>
            <?= $form->submit("Publier", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
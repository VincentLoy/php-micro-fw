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
    $result = $categoriesTable->update($_GET['id'], [
        'title' => $_POST['title'],
    ]);

    if($result) {
        ?>
            <div class="container">
                <div class="alert alert-success">
                    La catégorie a été ajoutée
                </div>
            </div>
        <?php
    }
}
$category = $categoriesTable->find($_GET['id']);

$form = new BootstrapForm($category);
?>

<div class="row">
    <h1 class="text-center">Modifier une catégorie</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form method="post">
            <?= $form->input('title', "Titre de la catégorie"); ?>
            <?= $form->submit("Mettre à jour", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
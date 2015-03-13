<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:26
 */

use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)) {
    $result = $postTable->create([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'categorie_id' => $_POST['categorie_id'],
    ]);

    if($result) {
       header('Location: admin.php?page=posts.edit&id='.App::getInstance()->getDb()->lastInsertId());
    }
}

$categories = App::getInstance()->getTable('Category')->toList('id', 'title');

$form = new BootstrapForm($_POST);
?>

<div class="row">
    <h1 class="text-center">Ajouter un article</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form method="post">
            <?= $form->input('title', "Titre de l'article"); ?>
            <?= $form->input('content', "Contenu", "textarea"); ?>
            <?= $form->select('categorie_id', 'Categorie', $categories); ?>
            <?= $form->submit("Publier", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
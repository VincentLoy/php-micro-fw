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
    $result = $postTable->update($_GET['id'], [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'categorie_id' => $_POST['categorie_id'],
    ]);

    if($result) {
        ?>
            <div class="container">
                <div class="alert alert-success">
                    L'article à été ajouté
                </div>
            </div>
        <?php
    }
}
$post = $postTable->find($_GET['id']);

$categories = App::getInstance()->getTable('Category')->toList('id', 'title');

$form = new BootstrapForm($post);
?>

<div class="row">
    <h1 class="text-center">Modifier un article</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form method="post">
            <?= $form->input('title', "Titre de l'article"); ?>
            <?= $form->input('content', "Contenu", "textarea"); ?>
            <?= $form->select('categorie_id', 'Categorie', $categories); ?>
            <?= $form->submit("Mettre à jour", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
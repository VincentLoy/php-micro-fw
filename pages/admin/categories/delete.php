<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:26
 */

use Core\HTML\BootstrapForm;

$categoriesTable = App::getInstance()->getTable('Category');

if($_POST['id'] == 6) {
    header("Location: admin.php?page=categories.index&msg=cat-error");
}

if(!empty($_POST)) {
    $postTable = App::getInstance()->getTable('Post');


    $posts = $postTable->lastByCategory($_POST['id']);

    foreach($posts as $post) {
        //var_dump($post);die;
        $result = $postTable->update($post->id, [
            'categorie_id' => 6,
        ]);
    }

    $result = $categoriesTable->delete($_POST['id']);
    header("Location: admin.php?page=categories.index");
}
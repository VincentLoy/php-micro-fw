<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:02
 */

$posts = App::getInstance()->getTable('Post')->all();
?>

<h1>Administrer les articles</h1>

<p>
    <a href="?page=posts.add" class="btn btn-info">Ajouter un article</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td>
                    <?= $post->id; ?>
                </td>
                <td>
                    <?= $post->title; ?>
                </td>
                <td>
                    <a class="btn-primary btn" href="?page=posts.edit&id=<?= $post->id; ?>">Editer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 13/03/2015
 * Time: 17:02
 */

$categories = App::getInstance()->getTable('Category')->all();
?>

<h1>Administrer les categories</h1>

<p>
    <a href="?page=categories.add" class="btn btn-info">
        <i class="fa fa-plus"></i>
        Ajouter une catégorie
    </a>
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
        <?php foreach($categories as $categoriy): ?>
            <tr>
                <td>
                    <?= $categoriy->id; ?>
                </td>
                <td>
                    <?= $categoriy->title; ?>
                </td>
                <td>
                    <a class="btn-primary btn" href="?page=categories.edit&id=<?= $categoriy->id; ?>">Editer</a>

                    <form action="?page=categories.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $categoriy->id; ?>"/>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
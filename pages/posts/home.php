<?php


?>

<div class="row">
    <main class="col-sm-8">
        <?php

        foreach(App::getInstance()->getTable('Post')->last() as $post): ?>
            <h2>
                <a href="<?= $post->url; ?>">
                    <?= $post->title; ?>
                </a>
            </h2>
            <p>
                <em>
                    <?= $post->categorie ?>
                </em>
            </p>

            <p>
                <?= $post->extrait; ?>
            </p>
        <?php endforeach; ?>
    </main>

    <aside class="col-sm-4">
        <?php foreach(App::getInstance()->getTable('Category')->all() as $categorie): ?>
            <li>
                <a href="<?= $categorie->url; ?>">
                    <?= $categorie->title; ?>
                </a>
            </li>
        <?php endforeach ?>
    </aside>
</div>
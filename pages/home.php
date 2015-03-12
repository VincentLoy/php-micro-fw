<?php
use App\Tables\Article;

\App\App::setTitle("Accueil");
?>

<div class="row">
    <main class="col-sm-8">
        <?php

        foreach(Article::getLast() as $post): ?>
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
        <?php foreach(\App\Tables\Categorie::getAll() as $categorie): ?>
            <li>
                <a href="<?= $categorie->url; ?>">
                    <?= $categorie->title; ?>
                </a>
            </li>
        <?php endforeach ?>
    </aside>
</div>
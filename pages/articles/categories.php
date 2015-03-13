<?php
use App\App;
use App\Tables\Article;
use App\Tables\Categorie;

$categorie = Categorie::find($_GET['id']);

if($categorie === false) {

    App::notFound();

}

$articles = Article::lastByCategory($_GET['id']);

$categories = Categorie::getAll();

?>
<h1>
    <?= $categorie->title ?>
</h1>
<div class="row">
    <main class="col-sm-8">
        <?php foreach($articles as $post): ?>
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
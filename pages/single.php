<?php
use App\App;
use App\Tables\Article;
use App\Tables\Categorie;

$post = Article::find($_GET['id']);

if($post === false) {
    App::notFound();
}

$categorie = Categorie::find($post->categorie_id);

?>

<h1>
    <?= $post->title; ?>
</h1>
<p>
    <em>
        <?= $categorie->title; ?>
    </em>
</p>

<p>
    <?= $post->content; ?>
</p>
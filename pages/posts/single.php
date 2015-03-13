<?php

$post = App::getInstance();

$post = $post->getTable('Post')->find($_GET['id']);

if($post === false) {
    $app->notFound();
}

?>

<h1>
    <?= $post->title; ?>
</h1>
<p>
    <em>
        Categorie - <?= $post->categorie; ?>
    </em>
</p>

<p>
    <?= $post->content; ?>
</p>
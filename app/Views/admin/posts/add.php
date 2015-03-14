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
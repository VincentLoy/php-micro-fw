<div class="row">
    <h1 class="text-center">Modifier une catégorie</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form method="post">
            <?= $form->input('title', "Titre de la catégorie"); ?>
            <?= $form->submit("Ajouter", 'submit' ,['btn-info']); ?>
        </form>
    </div>
</div>
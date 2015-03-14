<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php?page=admin.posts.index">Articles</a></li>
    <li role="presentation" class="active"><a href="index.php?page=admin.categories.index">Categories</a></li>
</ul>

<h1>Administrer les categories</h1>

<p>
    <a href="?page=admin.categories.add" class="btn btn-info">
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
                    <a class="btn-primary btn" href="?page=admin.categories.edit&id=<?= $categoriy->id; ?>">Editer</a>

                    <form action="?page=admin.categories.delete" method="post" style="display: inline;">
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
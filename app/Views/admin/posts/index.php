<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="index.php?page=admin.posts.index">Articles</a></li>
    <li role="presentation"><a href="index.php?page=admin.categories.index">Categories</a></li>
</ul>

<h1>Administrer les articles</h1>

<p>
    <a href="?page=admin.posts.add" class="btn btn-info">
        <i class="fa fa-plus"></i>
        Ajouter un article
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
        <?php foreach($posts as $post): ?>
            <tr>
                <td>
                    <?= $post->id; ?>
                </td>
                <td>
                    <?= $post->title; ?>
                </td>
                <td>
                    <a class="btn-primary btn" href="?page=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>

                    <form action="?page=admin.posts.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $post->id; ?>"/>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
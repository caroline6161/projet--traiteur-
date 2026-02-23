<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des thèmes</h1>

<a href="index.php?page=theme-create" class="btn">Ajouter un thème</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($themes as $t): ?>
        <tr>
            <td><?= $t['theme_id'] ?></td>
            <td><?= $t['nom'] ?></td>
            <td>
                <a href="index.php?page=theme-edit&id=<?= $t['theme_id'] ?>">Modifier</a>
                <a href="index.php?page=theme-delete&id=<?= $t['theme_id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

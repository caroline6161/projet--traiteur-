<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des plats</h1>

<a href="index.php?page=plat-create" class="btn">Ajouter un plat</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($plats as $plat): ?>
        <tr>
            <td><?= $plat['plat_id'] ?></td>
            <td><?= htmlspecialchars($plat['titre']) ?></td>
            <td><?= $plat['prix'] ?> €</td>
            <td>
                <a href="index.php?page=plat-edit&id=<?= $plat['plat_id'] ?>">Modifier</a>
                <a href="index.php?page=plat-delete&id=<?= $plat['plat_id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

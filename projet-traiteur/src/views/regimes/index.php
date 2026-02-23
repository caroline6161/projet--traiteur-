<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des régimes</h1>

<a href="index.php?page=regime-create" class="btn">Ajouter un régime</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($regimes as $r): ?>
        <tr>
            <td><?= $r['regime_id'] ?></td>
            <td><?= $r['nom'] ?></td>
            <td>
                <a href="index.php?page=regime-edit&id=<?= $r['regime_id'] ?>">Modifier</a>
                <a href="index.php?page=regime-delete&id=<?= $r['regime_id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

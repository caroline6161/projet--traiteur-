<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des allergènes</h1>

<a href="index.php?page=allergene-create" class="btn">Ajouter un allergène</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($allergenes as $a): ?>
        <tr>
            <td><?= $a['allergene_id'] ?></td>
            <td><?= $a['nom'] ?></td>
            <td>
                <a href="index.php?page=allergene-edit&id=<?= $a['allergene_id'] ?>">Modifier</a>
                <a href="index.php?page=allergene-delete&id=<?= $a['allergene_id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

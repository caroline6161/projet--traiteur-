<?php include 'src/views/layout/header.php'; ?>

<h1>Gestion des menus</h1>

<a href="index.php?page=menu-create" class="btn">Ajouter un menu</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Thème</th>
        <th>Régime</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($menus as $menu): ?>
        <tr>
            <td><?= $menu['menu_id'] ?></td>
            <td><?= $menu['titre'] ?></td>
            <td><?= $menu['theme'] ?></td>
            <td><?= $menu['regime'] ?></td>
            <td><?= $menu['prix_par_personne'] ?> €</td>

            <td>
                <a href="index.php?page=menu&id=<?= $menu['menu_id'] ?>">Voir</a>
                <a href="index.php?page=menu-edit&id=<?= $menu['menu_id'] ?>">Modifier</a>
                <a href="index.php?page=menu-delete&id=<?= $menu['menu_id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

<?php include 'src/views/layout/header.php'; ?>

<h1>Commandes</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Total</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php foreach ($commandes as $c): ?>
        <tr>
            <td>#<?= $c['commande_id'] ?></td>
            <td><?= $c['client'] ?? 'Client inconnu' ?></td>
            <td><?= $c['total'] ?> €</td>
            <td><?= $c['date_commande'] ?></td>
            <td>
                <a href="index.php?page=admin-commande-detail&id=<?= $c['commande_id'] ?>">
                    Voir
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'src/views/layout/footer.php'; ?>

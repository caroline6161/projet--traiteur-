<?php
include 'src/views/layout/header.php';
?>

<div class="admin-wrapper">

    <h1>Détail de la commande #<?= $commande['commande_id'] ?></h1>

    <p><strong>Client :</strong> <?= htmlspecialchars($commande['email']) ?></p>
    <p><strong>Date commande :</strong> <?= $commande['date_commande'] ?></p>
    <p><strong>Date prestation :</strong> <?= $commande['date_prestation'] ?> à <?= $commande['heure'] ?></p>
    <p><strong>Statut :</strong>
        <span class="status <?= $commande['status'] ?>">
            <?= ucfirst(str_replace('_', ' ', $commande['status'])) ?>
        </span>
    </p>
    <p><strong>Total :</strong> <?= number_format($commande['total'], 2) ?> €</p>

    <h2>Menus de la commande</h2>

    <?php if (empty($items)): ?>
        <p>Aucun menu associé à cette commande.</p>
    <?php else: ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['titre']) ?></td>
                        <td><?= number_format($item['prix'], 2) ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <p style="margin-top:20px;">
        <a href="index.php?page=admin-commandes" class="btn-admin">⬅ Retour à la liste des commandes</a>
    </p>

</div>

<?php include 'src/views/layout/footer.php'; ?>

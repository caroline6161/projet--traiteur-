<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}

include 'src/views/layout/header.php';
?>

<div class="admin-wrapper">

    <h1>Gestion des commandes</h1>

    <?php if (empty($commandes)): ?>
        <p>Aucune commande pour le moment.</p>
    <?php else: ?>

        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Date commande</th>
                    <th>Prestation</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($commandes as $commande): ?>
                    <tr>
                        <td><?= $commande['commande_id'] ?></td>
                        <td><?= htmlspecialchars($commande['email']) ?></td>
                        <td><?= $commande['date_commande'] ?></td>
                        <td><?= $commande['date_prestation'] ?> à <?= $commande['heure'] ?></td>
                        <td><?= number_format($commande['total'], 2) ?> €</td>

                        <td>
                            <span class="status <?= $commande['status'] ?>">
                                <?= ucfirst(str_replace('_', ' ', $commande['status'])) ?>
                            </span>
                        </td>

                        <td class="actions">

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=accepte" class="btn-admin">Accepté</a>

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=en_preparation" class="btn-admin">Préparation</a>

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=en_cours_de_livraison" class="btn-admin">Livraison</a>

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=livre" class="btn-admin">Livré</a>

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=en_attente_retour_materiel" class="btn-admin">Attente matériel</a>

                            <a href="index.php?page=update-status&id=<?= $commande['commande_id'] ?>&status=terminee" class="btn-admin btn-green">Terminée</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

    <p><a href="index.php?page=admin-dashboard">⬅ Retour au dashboard</a></p>

</div>

<?php include 'src/views/layout/footer.php'; ?>

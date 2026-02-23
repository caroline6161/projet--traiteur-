<?php include 'src/views/layout/header.php'; ?>

<h1>Mes commandes</h1>

<?php if (empty($commandes)): ?>
    <p>Aucune commande pour le moment.</p>
<?php else: ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Date</th>
        </tr>

        <?php foreach ($commandes as $c): ?>
            <tr>
                <td><?= $c['commande_id'] ?></td>
                <td><?= $c['total'] ?> €</td>
                <td><?= $c['date_commande'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php include 'src/views/layout/footer.php'; ?>

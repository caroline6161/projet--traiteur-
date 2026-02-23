<?php include 'src/views/layout/header.php'; ?>

<h1>Votre panier</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>

    <table class="table">
        <tr>
            <th>Menu</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>

        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
            <tr>
                <td><?= $item['titre'] ?></td>
                <td><?= $item['prix'] ?> €</td>
                <td>
                    <a href="index.php?page=remove-from-cart&index=<?= $index ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="index.php?page=checkout" class="btn">Passer commande</a>

<?php endif; ?>

<?php include 'src/views/layout/footer.php'; ?>

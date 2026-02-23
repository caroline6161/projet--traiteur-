<?php include 'src/views/layout/header.php'; ?>

<h1><?= $menu['titre'] ?></h1>

<p><strong>Thème :</strong> <?= $menu['theme'] ?></p>
<p><strong>Régime :</strong> <?= $menu['regime'] ?></p>
<p><strong>Prix :</strong> <?= $menu['prix_par_personne'] ?> €</p>

<h2>Plats du menu</h2>

<?php foreach ($plats as $plat): ?>
    <div class="plat">
        <h3><?= $plat['titre_plat'] ?> — <?= $plat['prix'] ?> €</h3>
        <p><?= $plat['description'] ?></p>

        <?php if (!empty($plat['allergenes'])): ?>
            <p><strong>Allergènes :</strong>
                <?php foreach ($plat['allergenes'] as $a): ?>
                    <?= $a['libelle'] ?>,
                <?php endforeach; ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<a href="index.php?page=add-to-cart&id=<?= $menu['menu_id'] ?>" class="btn">
    Ajouter au panier
</a>

<?php include 'src/views/layout/footer.php'; ?>

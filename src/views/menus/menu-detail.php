<?php include 'src/views/layout/header.php'; ?>

<div class="menu-detail">

    <h1><?= htmlspecialchars($menu['titre']) ?></h1>

    <p><strong>Thème :</strong> <?= htmlspecialchars($menu['theme']) ?></p>
    <p><strong>Régime :</strong> <?= htmlspecialchars($menu['regime']) ?></p>
    <p><strong>Prix :</strong> <?= htmlspecialchars($menu['prix_par_personne']) ?> € / personne</p>

    <h2>Plats du menu</h2>

    <?php foreach ($plats as $plat): ?>
        <div class="plat">
            <h3><?= htmlspecialchars($plat['nom']) ?> — <?= htmlspecialchars($plat['prix']) ?> €</h3>
            <p><?= nl2br(htmlspecialchars($plat['description'])) ?></p>

            <?php if (!empty($plat['allergenes'])): ?>
                <p><strong>Allergènes :</strong>
                    <?php foreach ($plat['allergenes'] as $a): ?>
                        <?= htmlspecialchars($a['nom']) ?>,
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <a href="index.php?page=add-to-cart&id=<?= $menu['menu_id'] ?>" class="btn">
        Ajouter au panier
    </a>

</div>

<?php include 'src/views/layout/footer.php'; ?>

<?php include 'src/views/layout/header.php'; ?>

<div class="profil-wrapper">
    <h1>Mon profil</h1>

    <?php if (!empty($_SESSION['success'])): ?>
        <p class="success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
    <?php endif; ?>

    <form action="index.php?page=profil-update" method="POST" class="profil-form">

        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

        <label>Nom</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

        <label>Téléphone</label>
        <input type="text" name="telephone" value="<?= htmlspecialchars($user['telephone']) ?>" required>

        <label>Adresse</label>
        <input type="text" name="adresse" value="<?= htmlspecialchars($user['adresse']) ?>" required>

        <label>Ville</label>
        <input type="text" name="ville" value="<?= htmlspecialchars($user['ville']) ?>" required>

        <label>Pays</label>
        <input type="text" name="pays" value="<?= htmlspecialchars($user['pays']) ?>" required>

        <button type="submit" class="btn">Mettre à jour</button>
    </form>

    <h2>Mes commandes</h2>

    <?php foreach (CommandeModel::getCommandesByUser($user['utilisateur_id']) as $cmd): ?>
        <div class="commande-card">
            <p><strong>Commande #<?= $cmd['commande_id'] ?></strong></p>
            <p>Statut : <?= $cmd['statut'] ?></p>

            <?php if ($cmd['statut'] === 'en_attente'): ?>
                <a href="index.php?page=commande-annuler&id=<?= $cmd['commande_id'] ?>" class="btn-red">Annuler</a>
                <a href="index.php?page=commande-modifier&id=<?= $cmd['commande_id'] ?>" class="btn">Modifier</a>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</div>

<?php include 'src/views/layout/footer.php'; ?>

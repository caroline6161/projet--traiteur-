<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier un plat</h1>

<form action="index.php?page=plat-edit-submit" method="POST">

    <input type="hidden" name="id" value="<?= $plat['plat_id'] ?>">

    <label>Nom</label>
    <input type="text" name="nom" value="<?= $plat['nom'] ?>" required>

    <label>Description</label>
    <textarea name="description"><?= $plat['description'] ?></textarea>

    <label>Prix</label>
    <input type="number" step="0.01" name="prix" value="<?= $plat['prix'] ?>" required>

    <button type="submit">Modifier</button>
</form>
<h2>Allergènes du plat</h2>

<ul>
<?php foreach (PlatModel::getAllergenesByPlat($plat['plat_id']) as $a): ?>
    <li>
        <?= $a['nom'] ?>
        <a href="index.php?page=plat-remove-allergene&plat_id=<?= $plat['plat_id'] ?>&allergene_id=<?= $a['allergene_id'] ?>">❌</a>
    </li>
<?php endforeach; ?>
</ul>

<h3>Ajouter un allergène</h3>

<form action="index.php?page=plat-add-allergene" method="POST">
    <input type="hidden" name="plat_id" value="<?= $plat['plat_id'] ?>">

    <select name="allergene_id">
        <?php foreach (AllergeneModel::getAll() as $a): ?>
            <option value="<?= $a['allergene_id'] ?>"><?= $a['nom'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Ajouter</button>
</form>


<?php include 'src/views/layout/footer.php'; ?>

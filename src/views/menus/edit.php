<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier un menu</h1>

<form action="index.php?page=menu-edit-submit" method="POST">

    <input type="hidden" name="id" value="<?= $menu['menu_id'] ?>">

    <label>Titre</label>
    <input type="text" name="titre" value="<?= $menu['titre'] ?>" required>

    <label>Description</label>
    <textarea name="description"><?= $menu['description'] ?></textarea>

    <label>Thème</label>
    <select name="theme_id">
        <option value="1" <?= $menu['theme_id']==1?'selected':'' ?>>Classique</option>
        <option value="2" <?= $menu['theme_id']==2?'selected':'' ?>>Noël</option>
        <option value="3" <?= $menu['theme_id']==3?'selected':'' ?>>Événement</option>
    </select>

    <label>Régime</label>
    <select name="regime_id">
        <option value="1" <?= $menu['regime_id']==1?'selected':'' ?>>Classique</option>
        <option value="2" <?= $menu['regime_id']==2?'selected':'' ?>>Végétarien</option>
        <option value="3" <?= $menu['regime_id']==3?'selected':'' ?>>Végan</option>
    </select>

    <label>Nombre minimum de personnes</label>
    <input type="number" name="nombre_personne_minimum" value="<?= $menu['nombre_personne_minimum'] ?>">

    <label>Prix par personne</label>
    <input type="number" step="0.01" name="prix_par_personne" value="<?= $menu['prix_par_personne'] ?>">

    <label>Stock</label>
    <input type="number" name="quantite_restante" value="<?= $menu['quantite_restante'] ?>">

    <label>Conditions</label>
    <textarea name="conditions"><?= $menu['conditions'] ?></textarea>

    <button type="submit">Modifier</button>
</form>
<h2>Plats du menu</h2>

<ul>
<?php foreach (MenuModel::getPlatsByMenu($menu['menu_id']) as $p): ?>
    <li>
        <?= $p['nom'] ?> - <?= $p['prix'] ?> €
        <a href="index.php?page=menu-remove-plat&menu_id=<?= $menu['menu_id'] ?>&plat_id=<?= $p['plat_id'] ?>">❌</a>
    </li>
<?php endforeach; ?>
</ul>

<h3>Ajouter un plat</h3>

<form action="index.php?page=menu-add-plat" method="POST">
    <input type="hidden" name="menu_id" value="<?= $menu['menu_id'] ?>">

    <select name="plat_id">
        <?php foreach (PlatModel::getAllPlats() as $p): ?>
            <option value="<?= $p['plat_id'] ?>"><?= $p['nom'] ?> (<?= $p['prix'] ?> €)</option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Ajouter</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

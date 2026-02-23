<?php include 'src/views/layout/header.php'; ?>

<h1>Ajouter un menu</h1>

<form action="index.php?page=menu-create-submit" method="POST">

    <label>Titre</label>
    <input type="text" name="titre" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Thème</label>
    <select name="theme_id">
        <option value="1">Classique</option>
        <option value="2">Noël</option>
        <option value="3">Événement</option>
    </select>

    <label>Régime</label>
    <select name="regime_id">
        <option value="1">Classique</option>
        <option value="2">Végétarien</option>
        <option value="3">Végan</option>
    </select>

    <label>Nombre minimum de personnes</label>
    <input type="number" name="nombre_personne_minimum" required>

    <label>Prix par personne</label>
    <input type="number" step="0.01" name="prix_par_personne" required>

    <label>Stock</label>
    <input type="number" name="quantite_restante" required>

    <label>Conditions</label>
    <textarea name="conditions"></textarea>

    <button type="submit">Créer</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

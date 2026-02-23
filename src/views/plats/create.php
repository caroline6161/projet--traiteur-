<?php include 'src/views/layout/header.php'; ?>

<h1>Ajouter un plat</h1>

<form action="index.php?page=plat-create-submit" method="POST">

    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Prix</label>
    <input type="number" step="0.01" name="prix" required>

    <button type="submit">Créer</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

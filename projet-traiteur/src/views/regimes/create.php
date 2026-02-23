<?php include 'src/views/layout/header.php'; ?>

<h1>Ajouter un régime</h1>

<form action="index.php?page=regime-create-submit" method="POST">
    <label>Nom</label>
    <input type="text" name="nom" required>

    <button type="submit">Créer</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

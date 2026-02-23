<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier un régime</h1>

<form action="index.php?page=regime-edit-submit" method="POST">
    <input type="hidden" name="id" value="<?= $regime['regime_id'] ?>">

    <label>Nom</label>
    <input type="text" name="nom" value="<?= $regime['nom'] ?>" required>

    <button type="submit">Modifier</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

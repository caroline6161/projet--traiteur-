<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier un allergène</h1>

<form action="index.php?page=allergene-edit-submit" method="POST">

    <input type="hidden" name="id" value="<?= $allergene['allergene_id'] ?>">

    <label>Nom</label>
    <input type="text" name="nom" value="<?= $allergene['nom'] ?>" required>

    <button type="submit">Modifier</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

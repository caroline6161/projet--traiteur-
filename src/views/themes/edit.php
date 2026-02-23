<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier un thème</h1>

<form action="index.php?page=theme-edit-submit" method="POST">
    <input type="hidden" name="id" value="<?= $theme['theme_id'] ?>">

    <label>Nom</label>
    <input type="text" name="nom" value="<?= $theme['nom'] ?>" required>

    <button type="submit">Modifier</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

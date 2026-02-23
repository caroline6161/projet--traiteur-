<?php include 'src/views/layout/header.php'; ?>

<h1>Modifier la commande #<?= $cmd['commande_id'] ?></h1>

<form action="index.php?page=commande-modifier-submit" method="POST">

    <input type="hidden" name="id" value="<?= $cmd['commande_id'] ?>">

    <label>Nombre de personnes</label>
    <input type="number" name="nb_personnes" value="<?= $cmd['nb_personnes'] ?>" required>

    <label>Date de l'événement</label>
    <input type="date" name="date_event" value="<?= $cmd['date_event'] ?>" required>

    <label>Message</label>
    <textarea name="message"><?= htmlspecialchars($cmd['message']) ?></textarea>

    <button type="submit" class="btn">Enregistrer</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

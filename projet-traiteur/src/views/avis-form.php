<?php include 'src/views/layout/header.php'; ?>

<div class="avis-wrapper">

    <h1>Laisser un avis</h1>

    <p class="avis-info">
        Votre commande est terminée. Vous pouvez maintenant laisser une note et un commentaire.
    </p>

    <form action="index.php?page=avis-submit" method="POST" class="avis-form">

        <input type="hidden" name="commande_id" value="<?= $_GET['id'] ?>">

        <label for="note">Note :</label>
        <select name="note" id="note" required>
            <option value="">Choisir une note</option>
            <option value="1">1 ★</option>
            <option value="2">2 ★★</option>
            <option value="3">3 ★★★</option>
            <option value="4">4 ★★★★</option>
            <option value="5">5 ★★★★★</option>
        </select>

        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" placeholder="Votre avis..." rows="5"></textarea>

        <button type="submit" class="avis-btn">Envoyer l'avis</button>

    </form>

</div>

<?php include 'src/views/layout/footer.php'; ?>

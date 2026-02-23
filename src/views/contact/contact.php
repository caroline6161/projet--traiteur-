<?php include 'src/views/layout/header.php'; ?>

<div class="contact-wrapper">

    <div class="contact-container">

        <!-- FORMULAIRE -->
        <div class="contact-form">
            <h2>Contact</h2>
            <p>Envoyez-nous un message</p>

            <form method="POST">
                <label>Sujet</label>
                <input type="text" placeholder="Sujet de votre message" required>

                <label>Votre email</label>
                <input type="email" placeholder="votre@email.fr" required>

                <label>Message</label>
                <textarea placeholder="Votre message..." required></textarea>

                <button type="submit" class="btn-contact">Envoyer</button>
            </form>
        </div>

        <!-- COLONNE DE DROITE (VIDE POUR L’INSTANT) -->
        <div class="contact-info">
            <h2>Nos coordonnées</h2>
            <p style="color:#777;">(À compléter plus tard)</p>
        </div>

    </div>

</div>

<?php include 'src/views/layout/footer.php'; ?>

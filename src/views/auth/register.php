<?php include 'src/views/layout/header.php'; ?>

<div class="auth-wrapper">
    <h1>Créer un compte</h1>

    <?php if (!empty($error)): ?>
        <p class="auth-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="index.php?page=register-submit" method="POST" class="auth-form">

        <div class="auth-row">
            <div>
                <label>Prénom</label>
                <input type="text" name="prenom" required>
            </div>
            <div>
                <label>Nom</label>
                <input type="text" name="nom" required>
            </div>
        </div>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Téléphone</label>
        <input type="text" name="telephone" required>

        <label>Adresse postale</label>
        <input type="text" name="adresse" required>

        <div class="auth-row">
            <div>
                <label>Ville</label>
                <input type="text" name="ville" required>
            </div>
            <div>
                <label>Pays</label>
                <input type="text" name="pays" required>
            </div>
        </div>

        <label>Mot de passe</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirm" required>

        <!-- RGPD OBLIGATOIRE -->
        <div class="auth-rgpd">
            <input type="checkbox" name="rgpd" value="1" required>
            <label>J’accepte la politique de confidentialité et les CGV.</label>
        </div>

        <button type="submit" class="auth-btn">Créer mon compte</button>

        <p class="auth-link">
            Déjà un compte ? <a href="index.php?page=login">Se connecter</a>
        </p>

    </form>
</div>

<?php include 'src/views/layout/footer.php'; ?>

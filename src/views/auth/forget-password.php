<?php include 'src/views/layout/header.php'; ?>

<div class="auth-simple-wrapper">
    <div class="auth-simple-card">

        <h2 class="auth-simple-title">Mot de passe oublié</h2>
        <p class="auth-simple-subtitle">Entrez votre email pour réinitialiser votre mot de passe</p>

        <form action="index.php?page=forgot-submit" method="POST" class="auth-simple-form">

            <label>Email</label>
            <input type="email" name="email" placeholder="votre@email.fr" required>

            <button type="submit" class="auth-simple-btn">Envoyer le lien</button>
        </form>

        <p class="auth-simple-switch">
            Vous vous souvenez de votre mot de passe ?
            <a href="index.php?page=login">Se connecter</a>
        </p>

    </div>
</div>

<?php include 'src/views/layout/footer.php'; ?>

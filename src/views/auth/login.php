<?php include 'src/views/layout/header.php'; ?>

<div class="auth-simple-wrapper">
    <div class="auth-simple-card">

        <h2 class="auth-simple-title">Connexion</h2>
        <p class="auth-simple-subtitle">Connectez-vous pour commander nos menus</p>

        <?php if (!empty($error)): ?>
            <p class="auth-error"><?= $error ?></p>
        <?php endif; ?>

        <?php if (!empty($_GET['register']) && $_GET['register'] === 'ok'): ?>
            <p class="auth-success">Votre compte a été créé avec succès. Vous pouvez vous connecter.</p>
        <?php endif; ?>

        <?php if (!empty($_GET['reset']) && $_GET['reset'] === 'ok'): ?>
            <p class="auth-success">Votre mot de passe a été réinitialisé.</p>
        <?php endif; ?>

        <form action="index.php?page=login-submit" method="POST" class="auth-simple-form">

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mot de passe</label>
            <input type="password" name="password" required>

            <a href="index.php?page=forgot" class="auth-simple-forgot">Mot de passe oublié ?</a>

            <button type="submit" class="auth-simple-btn">Se connecter</button>
        </form>

        <p class="auth-simple-switch">
            Pas encore de compte ?
            <a href="index.php?page=register">Créer un compte</a>
        </p>

    </div>
</div>

<?php include 'src/views/layout/footer.php'; ?>

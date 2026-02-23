<?php include 'src/views/layout/header.php'; ?>

<div class="auth-simple-wrapper">
    <div class="auth-simple-card">

        <h2 class="auth-simple-title">Nouveau mot de passe</h2>

        <form action="index.php?page=reset-submit" method="POST" class="auth-simple-form">
            <input type="hidden" name="token" value="<?= $_GET['token'] ?>">

            <label>Nouveau mot de passe</label>
            <input type="password" name="password" required>

            <button class="auth-simple-btn">Réinitialiser</button>
        </form>

    </div>
</div>

<?php include 'src/views/layout/footer.php'; ?>

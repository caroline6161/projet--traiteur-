<?php include 'src/views/layout/header.php'; ?>

<div class="auth-wrapper">
    <h1>Nouveau mot de passe</h1>

    <?php if (!empty($error)): ?>
        <p class="auth-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="index.php?page=reset-password-submit" method="POST" class="auth-form">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">

        <label>Nouveau mot de passe</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe</label>
        <input type="password" name="password_confirm" required>

        <button type="submit" class="auth-btn">Réinitialiser</button>
    </form>
</div>

<?php include 'src/views/layout/footer.php'; ?>

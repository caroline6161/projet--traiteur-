<?php include 'src/views/layout/header.php'; ?>

<div class="auth-wrapper">
    <h1>Mot de passe oublié</h1>

    <?php if (!empty($error)): ?>
        <p class="auth-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="auth-success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form action="index.php?page=forgot-password-submit" method="POST" class="auth-form">
        <label>Email</label>
        <input type="email" name="email" required>

        <button type="submit" class="auth-btn">Envoyer le lien</button>
    </form>
</div>

<?php include 'src/views/layout/footer.php'; ?>

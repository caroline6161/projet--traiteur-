<?php include 'src/views/layout/header.php'; ?>

<h1>Créer un employé</h1>

<?php if (!empty($error)): ?>
    <p class="auth-error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form action="index.php?page=admin-employe-create-submit" method="POST" class="auth-form">

    <label>Prénom</label>
    <input type="text" name="prenom" required>

    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <button type="submit" class="btn">Créer</button>
</form>

<?php include 'src/views/layout/footer.php'; ?>

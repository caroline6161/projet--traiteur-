<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}
?>

<?php include 'src/views/layout/header.php'; ?>

<h1>Espace administrateur</h1>
<p>Bienvenue <?= htmlspecialchars($_SESSION['user']['prenom']) ?> <?= htmlspecialchars($_SESSION['user']['nom'] ?? '') ?></p>

<ul>
    <li><a href="index.php?page=admin-menus">Gérer les menus</a></li>
    <li><a href="index.php?page=admin-plats">Gérer les plats</a></li>
    <li><a href="index.php?page=admin-commandes">Gérer les commandes</a></li>
</ul>

<?php include 'src/views/layout/footer.php'; ?>

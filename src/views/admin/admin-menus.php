<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}
include 'src/views/layout/header.php';
?>

<div class="admin-wrapper">
    <h1>Gestion des menus</h1>

    <p>Accéder au CRUD complet des menus :</p>

    <p>
        <a href="index.php?page=menus" class="btn-admin">Voir tous les menus</a>
        <a href="index.php?page=menu-create" class="btn-admin btn-green">Ajouter un menu</a>
    </p>

    <p><a href="index.php?page=admin-dashboard">⬅ Retour au dashboard</a></p>
</div>

<?php include 'src/views/layout/footer.php'; ?>

<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}
include 'src/views/layout/header.php';
?>

<div class="admin-wrapper">
    <h1>Gestion des plats</h1>

    <p>Accéder au CRUD complet des plats :</p>

    <p>
        <a href="index.php?page=plats" class="btn-admin">Voir tous les plats</a>
        <a href="index.php?page=plat-create" class="btn-admin btn-green">Ajouter un plat</a>
    </p>

    <p><a href="index.php?page=admin-dashboard">⬅ Retour au dashboard</a></p>
</div>

<?php include 'src/views/layout/footer.php'; ?>

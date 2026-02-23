<?php
session_start();
require_once 'src/models/CommandeModel.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

$user_id = $_SESSION['user']['id'];
$total = array_sum(array_column($_SESSION['cart'], 'prix'));

// 1) Créer la commande
$commande_id = CommandeModel::create($user_id, $total);

// 2) Ajouter les items
foreach ($_SESSION['cart'] as $item) {
    CommandeModel::addItem($commande_id, $item['id'], $item['prix']);
}

// 3) Vider le panier
$_SESSION['cart'] = [];

header("Location: index.php?page=mes-commandes");
exit;

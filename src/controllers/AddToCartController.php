<?php
require_once 'src/models/MenuModel.php';

session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php?page=menus");
    exit;
}

$menu = MenuModel::getById($id);

if (!$menu) {
    header("Location: index.php?page=menus");
    exit;
}

// Initialiser le panier si vide
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter au panier
$_SESSION['cart'][] = [
    'id' => $menu['menu_id'],
    'titre' => $menu['titre'],
    'prix' => $menu['prix_par_personne']
];

header("Location: index.php?page=cart");
exit;

<?php

require_once 'src/models/MenuModel.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID du menu manquant");
}

// Récupération du menu
$menu = MenuModel::getById($id);

// Récupération des plats du menu
$plats = MenuModel::getPlatsByMenu($id);

// Récupération des allergènes pour chaque plat
foreach ($plats as &$plat) {
    global $db;
    $q = $db->prepare("
        SELECT a.libelle 
        FROM allergene a
        JOIN plat_allergene pa ON a.allergene_id = pa.allergene_id
        WHERE pa.plat_id = ?
    ");
    $q->execute([$plat['plat_id']]);
    $plat['allergenes'] = $q->fetchAll(PDO::FETCH_ASSOC);
}

require 'src/views/menu-detail.php';

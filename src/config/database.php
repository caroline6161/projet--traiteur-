<?php
global $db;

try {
    $db = new PDO(
        "mysql:host=localhost;port=3307;dbname=projet_traiteur;charset=utf8",
        "root",
        "" // <-- SI TU N’AS PAS DE MOT DE PASSE
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

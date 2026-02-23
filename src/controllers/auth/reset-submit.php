<?php

require_once 'src/models/UserModel.php';

$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Vérifier le token
$user = getUserByResetToken($token);

if (!$user) {
    die("Token invalide.");
}

// Mettre à jour le mot de passe
global $pdo;
$stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE id = ?");
$stmt->execute([$password, $user['id']]);

header("Location: index.php?page=login");
exit;

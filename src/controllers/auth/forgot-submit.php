<?php

require_once 'src/models/UserModel.php';

$email = $_POST['email'];

// Vérifier si l'email existe
$user = getUserByEmail($email);

if (!$user) {
    $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
    header("Location: index.php?page=forgot");
    exit;
}

// Générer un token
$token = bin2hex(random_bytes(32));

// Enregistrer le token en base
saveResetToken($user['id'], $token);

// Lien de réinitialisation
$resetLink = "http://localhost/projet-traiteur/index.php?page=reset&token=" . $token;

// Envoyer l'email (version simple)
mail($email, "Réinitialisation du mot de passe", 
    "Cliquez sur ce lien pour réinitialiser votre mot de passe : $resetLink"
);

// Message de confirmation
$_SESSION['success'] = "Un lien de réinitialisation vous a été envoyé.";
header("Location: index.php?page=forgot");
exit;

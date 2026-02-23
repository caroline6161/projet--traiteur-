<?php

class UserModel
{
    /**
     * Vérifie si un email existe déjà
     */
    public static function emailExists($email)
    {
        global $db;
        $q = $db->prepare("SELECT utilisateur_id FROM utilisateur WHERE email = ?");
        $q->execute([$email]);
        return $q->fetch() ? true : false;
    }

    /**
     * Crée un utilisateur
     */
    public static function createUser($data)
    {
        global $db;

        $q = $db->prepare("
            INSERT INTO utilisateur 
            (email, password, prenom, nom, telephone, ville, pays, adresse_postale, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $ok = $q->execute([
            $data['email'],
            $data['password'],
            $data['prenom'],
            $data['nom'],
            $data['telephone'],
            $data['ville'],
            $data['pays'],
            $data['adresse'],
            $data['role']
        ]);

        return $ok ? $db->lastInsertId() : false;
    }

    /**
     * Récupère un utilisateur par email (connexion)
     */
    public static function getUserByEmail($email)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $q->execute([$email]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Stocke un token de réinitialisation
     */
    public static function storeResetToken($userId, $token)
    {
        global $db;
        $q = $db->prepare("UPDATE utilisateur SET reset_token = ? WHERE utilisateur_id = ?");
        return $q->execute([$token, $userId]);
    }

    /**
     * Récupère un utilisateur via un token
     */
    public static function getUserByToken($token)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM utilisateur WHERE reset_token = ?");
        $q->execute([$token]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Met à jour le mot de passe
     */
    public static function updatePassword($userId, $hash)
    {
        global $db;
        $q = $db->prepare("UPDATE utilisateur SET password = ? WHERE utilisateur_id = ?");
        return $q->execute([$hash, $userId]);
    }

    /**
     * Supprime le token après réinitialisation
     */
    public static function clearResetToken($userId)
    {
        global $db;
        $q = $db->prepare("UPDATE utilisateur SET reset_token = NULL WHERE utilisateur_id = ?");
        return $q->execute([$userId]);
    }
    public static function storeResetToken($userId, $token)
{
    $db = Database::getConnection();
    $stmt = $db->prepare("UPDATE utilisateur SET reset_token=?, reset_expires=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE utilisateur_id=?");
    return $stmt->execute([$token, $userId]);
}

public static function getUserByToken($token)
{
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE reset_token=? AND reset_expires > NOW()");
    $stmt->execute([$token]);
    return $stmt->fetch();
}

public static function clearResetToken($userId)
{
    $db = Database::getConnection();
    $stmt = $db->prepare("UPDATE utilisateur SET reset_token=NULL, reset_expires=NULL WHERE utilisateur_id=?");
    return $stmt->execute([$userId]);
}
public static function getEmployes()
{
    $db = Database::getConnection();
    $stmt = $db->query("SELECT * FROM utilisateur WHERE role='employe' ORDER BY utilisateur_id DESC");
    return $stmt->fetchAll();
}

public static function createEmploye($data)
{
    $db = Database::getConnection();
    $stmt = $db->prepare("
        INSERT INTO utilisateur (prenom, nom, email, password, role, actif)
        VALUES (?, ?, ?, ?, 'employe', 1)
    ");
    return $stmt->execute([
        $data['prenom'],
        $data['nom'],
        $data['email'],
        $data['password']
    ]);
}

public static function disableUser($id)
{
    $db = Database::getConnection();
    $stmt = $db->prepare("UPDATE utilisateur SET actif=0 WHERE utilisateur_id=?");
    return $stmt->execute([$id]);
}

}

<?php

class AvisModel
{
    // Vérifie si un avis existe déjà pour une commande
    public static function hasReview($commandeId)
    {
        global $db;

        $query = $db->prepare("SELECT id FROM avis WHERE commande_id = ?");
        $query->execute([$commandeId]);

        return $query->fetch() ? true : false;
    }

    // Ajouter un avis
    public static function addReview($userId, $commandeId, $note, $commentaire)
    {
        global $db;

        $query = $db->prepare("
            INSERT INTO avis (user_id, commande_id, note, commentaire)
            VALUES (?, ?, ?, ?)
        ");

        return $query->execute([$userId, $commandeId, $note, $commentaire]);
    }

    // Récupérer tous les avis d'un utilisateur (optionnel)
    public static function getUserReviews($userId)
    {
        global $db;

        $query = $db->prepare("
            SELECT avis.*, commandes.date_commande
            FROM avis
            JOIN commandes ON avis.commande_id = commandes.id
            WHERE avis.user_id = ?
            ORDER BY avis.date_avis DESC
        ");

        $query->execute([$userId]);
        return $query->fetchAll();
    }
}

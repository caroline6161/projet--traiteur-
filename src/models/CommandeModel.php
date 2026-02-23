class CommandeModel
{
    public static function getCommandesByUser($userId)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM commande WHERE utilisateur_id=? ORDER BY commande_id DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public static function getCommande($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM commande WHERE commande_id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function updateStatut($id, $statut)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE commande SET statut=? WHERE commande_id=?");
        return $stmt->execute([$statut, $id]);
    }

    public static function updateCommande($id, $data)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            UPDATE commande 
            SET nb_personnes=?, date_event=?, message=? 
            WHERE commande_id=?
        ");
        return $stmt->execute([
            $data['nb_personnes'],
            $data['date_event'],
            $data['message'],
            $id
        ]);
    }
}

<?php

class MenuModel
{
    public static function getAll()
    {
        global $db;

        $q = $db->query("
            SELECT m.*, 
                   t.libelle AS theme, 
                   r.libelle AS regime
            FROM menu m
            LEFT JOIN theme t ON m.theme_id = t.theme_id
            LEFT JOIN regime r ON m.regime_id = r.regime_id
            ORDER BY m.menu_id DESC
        ");

        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    // ⭐ Fonction correcte pour récupérer un menu par ID
    public static function getById($id)
    {
        global $db;

        $q = $db->prepare("
            SELECT m.*, 
                   t.libelle AS theme, 
                   r.libelle AS regime
            FROM menu m
            LEFT JOIN theme t ON m.theme_id = t.theme_id
            LEFT JOIN regime r ON m.regime_id = r.regime_id
            WHERE m.menu_id = ?
        ");

        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public static function createMenu($data)
    {
        global $db;

        $q = $db->prepare("
            INSERT INTO menu (titre, description, theme_id, regime_id, nombre_personne_minimum, prix_par_personne, quantite_restante, conditions)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        return $q->execute([
            $data['titre'],
            $data['description'],
            $data['theme_id'],
            $data['regime_id'],
            $data['nombre_personne_minimum'],
            $data['prix_par_personne'],
            $data['quantite_restante'],
            $data['conditions']
        ]);
    }

    public static function updateMenu($id, $data)
    {
        global $db;

        $q = $db->prepare("
            UPDATE menu SET 
                titre = ?, 
                description = ?, 
                theme_id = ?, 
                regime_id = ?, 
                nombre_personne_minimum = ?, 
                prix_par_personne = ?, 
                quantite_restante = ?, 
                conditions = ?
            WHERE menu_id = ?
        ");

        return $q->execute([
            $data['titre'],
            $data['description'],
            $data['theme_id'],
            $data['regime_id'],
            $data['nombre_personne_minimum'],
            $data['prix_par_personne'],
            $data['quantite_restante'],
            $data['conditions'],
            $id
        ]);
    }

    public static function deleteMenu($id)
    {
        global $db;

        $q = $db->prepare("DELETE FROM menu WHERE menu_id = ?");
        return $q->execute([$id]);
    }

    public static function getPlatsByMenu($menu_id)
    {
        global $db;

        $q = $db->prepare("
            SELECT p.*, mp.type
            FROM plat p
            JOIN menu_plat mp ON p.plat_id = mp.plat_id
            WHERE mp.menu_id = ?
        ");

        $q->execute([$menu_id]);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addPlatToMenu($menu_id, $plat_id)
    {
        global $db;

        $q = $db->prepare("INSERT INTO menu_plat (menu_id, plat_id) VALUES (?, ?)");
        return $q->execute([$menu_id, $plat_id]);
    }

    public static function removePlatFromMenu($menu_id, $plat_id)
    {
        global $db;

        $q = $db->prepare("DELETE FROM menu_plat WHERE menu_id = ? AND plat_id = ?");
        return $q->execute([$menu_id, $plat_id]);
    }
}

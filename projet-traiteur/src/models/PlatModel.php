<?php

class PlatModel
{
    public static function getAllPlats()
    {
        global $db;
        $q = $db->query("SELECT * FROM plat ORDER BY plat_id DESC");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPlatById($id)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM plat WHERE plat_id = ?");
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public static function createPlat($data)
    {
        global $db;
        $q = $db->prepare("
            INSERT INTO plat (nom, description, prix)
            VALUES (?, ?, ?)
        ");

        return $q->execute([
            $data['nom'],
            $data['description'],
            $data['prix']
        ]);
    }

    public static function updatePlat($id, $data)
    {
        global $db;
        $q = $db->prepare("
            UPDATE plat SET 
                nom = ?, 
                description = ?, 
                prix = ?
            WHERE plat_id = ?
        ");

        return $q->execute([
            $data['nom'],
            $data['description'],
            $data['prix'],
            $id
        ]);
    }

    public static function deletePlat($id)
    {
        global $db;
        $q = $db->prepare("DELETE FROM plat WHERE plat_id = ?");
        return $q->execute([$id]);
    }
    public static function getAllergenesByPlat($plat_id)
{
    global $db;
    $q = $db->prepare("
        SELECT a.*
        FROM allergene a
        JOIN plat_allergene pa ON a.allergene_id = pa.allergene_id
        WHERE pa.plat_id = ?
    ");
    $q->execute([$plat_id]);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

public static function addAllergeneToPlat($plat_id, $allergene_id)
{
    global $db;
    $q = $db->prepare("INSERT INTO plat_allergene (plat_id, allergene_id) VALUES (?, ?)");
    return $q->execute([$plat_id, $allergene_id]);
}

public static function removeAllergeneFromPlat($plat_id, $allergene_id)
{
    global $db;
    $q = $db->prepare("DELETE FROM plat_allergene WHERE plat_id = ? AND allergene_id = ?");
    return $q->execute([$plat_id, $allergene_id]);
}

}

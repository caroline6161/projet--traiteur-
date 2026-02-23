<?php

class RegimeModel
{
    public static function getAll()
    {
        global $db;
        $q = $db->query("SELECT * FROM regime ORDER BY regime_id DESC");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM regime WHERE regime_id = ?");
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        global $db;
        $q = $db->prepare("INSERT INTO regime (nom) VALUES (?)");
        return $q->execute([$data['nom']]);
    }

    public static function update($id, $data)
    {
        global $db;
        $q = $db->prepare("UPDATE regime SET nom = ? WHERE regime_id = ?");
        return $q->execute([$data['nom'], $id]);
    }

    public static function delete($id)
    {
        global $db;
        $q = $db->prepare("DELETE FROM regime WHERE regime_id = ?");
        return $q->execute([$id]);
    }
}

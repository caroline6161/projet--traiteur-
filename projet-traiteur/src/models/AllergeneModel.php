<?php

class AllergeneModel
{
    public static function getAll()
    {
        global $db;
        $q = $db->query("SELECT * FROM allergene ORDER BY allergene_id DESC");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        global $db;
        $q = $db->prepare("SELECT * FROM allergene WHERE allergene_id = ?");
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        global $db;
        $q = $db->prepare("INSERT INTO allergene (nom) VALUES (?)");
        return $q->execute([$data['nom']]);
    }

    public static function update($id, $data)
    {
        global $db;
        $q = $db->prepare("UPDATE allergene SET nom = ? WHERE allergene_id = ?");
        return $q->execute([$data['nom'], $id]);
    }

    public static function delete($id)
    {
        global $db;
        $q = $db->prepare("DELETE FROM allergene WHERE allergene_id = ?");
        return $q->execute([$id]);
    }
}

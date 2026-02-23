<?php
require 'vendor/autoload.php';

class MongoModel
{
    public static function getCollection()
    {
        $client = new MongoDB\Client($_ENV['MONGO_URI']);
        return $client->traiteur->stats;
    }

    public static function insertStat($data)
    {
        $collection = self::getCollection();
        return $collection->insertOne($data);
    }

    public static function getStats()
    {
        $collection = self::getCollection();
        return $collection->find()->toArray();
    }
}

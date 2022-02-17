<?php

class PhotoModel
{
    public static function getAll()
    {
        include "./database/database-connection.php";
        $getPhotosQuery = $databaseConnection->query("SELECT * FROM photos;");
        $photos = $getPhotosQuery->fetchAll();
        return $photos;
    }
}

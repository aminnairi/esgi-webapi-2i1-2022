<?php

class AlbumModel
{
    public static function getAll()
    {
        include "./database/database-connection.php";
        $getAlbumsQuery = $databaseConnection->query("SELECT * FROM albums");
        $albums = $getAlbumsQuery->fetchAll();
        return $albums;
    }
}

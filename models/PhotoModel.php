<?php

include __DIR__ . "/../database/database-connection.php";

class PhotoModel
{
    public static function getAll()
    {
        $databaseConnection = Database::getConnection();
        $getPhotosQuery = $databaseConnection->query("SELECT * FROM photos;");
        $photos = $getPhotosQuery->fetchAll();
        return $photos;
    }

    public static function create($albumToCreate)
    {
        $databaseConnection = Database::getConnection();
        $createAlbumQuery = $databaseConnection->prepare("INSERT INTO photos(albumId, title, url, thumbnailUrl) VALUES(:albumId, :title, :url, :thumbnailUrl);");

        $createAlbumQuery->execute([
            "albumId" => $albumToCreate["albumId"],
            "title" => $albumToCreate["title"],
            "url" => $albumToCreate["url"],
            "thumbnailUrl" => $albumToCreate["thumbnailUrl"]
        ]);
    }
}

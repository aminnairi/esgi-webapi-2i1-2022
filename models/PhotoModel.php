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

    public static function create($albumToCreate)
    {
        include "./database/database-connection.php";

        $createAlbumQuery = $databaseConnection->prepare("INSERT INTO photos(albumId, title, url, thumbnailUrl) VALUES(:albumId, :title, :url, :thumbnailUrl);");

        $createAlbumQuery->execute([
            "albumId" => $albumToCreate["albumId"],
            "title" => $albumToCreate["title"],
            "url" => $albumToCreate["url"],
            "thumbnailUrl" => $albumToCreate["thumbnailUrl"]
        ]);
    }
}

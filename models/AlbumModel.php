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

    public static function create($albumToCreate)
    {
        include "./database/database-connection.php";

        $createAlbumQuery = $databaseConnection->prepare("INSERT INTO albums(userId, title) VALUES(:userId, :title);");

        $createAlbumQuery->execute([
            "userId" => $albumToCreate["userId"],
            "title" => $albumToCreate["title"]
        ]);
    }
}

<?php

include __DIR__ . "/../database/database-connection.php";

class PostModel
{
    public static function getAll()
    {
        $databaseConnection = Database::getConnection();
        $getPostsQuery = $databaseConnection->query("SELECT * FROM posts;");
        $posts = $getPostsQuery->fetchAll();
        return $posts;
    }

    public static function create($postToCreate)
    {
        $databaseConnection = Database::getConnection();
        $userId = $postToCreate["userId"];
        $title = $postToCreate["title"];
        $body = $postToCreate["body"];

        $createPostQuery = $databaseConnection->prepare("INSERT INTO posts(userId, title, body) VALUES(:userId, :title, :body);");

        $createPostQuery->execute([
            "userId" => $userId,
            "title" => $title,
            "body" => $body
        ]);
    }
}

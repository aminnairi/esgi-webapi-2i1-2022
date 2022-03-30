<?php

include __DIR__ . "/../database/database-connection.php";

class CommentModel
{
    public static function getAll()
    {
        $databaseConnection = Database::getConnection();
        $getCommentsQuery = $databaseConnection->query("SELECT * FROM comments;");
        $comments = $getCommentsQuery->fetchAll();
        return $comments;
    }

    public static function create($commentToCreate)
    {
        $databaseConnection = Database::getConnection();
        $createCommentQuery = $databaseConnection->prepare("INSERT INTO comments(postId, name, email) VALUES(:postId, :name, :email);");

        $createCommentQuery->execute([
            "postId" => $commentToCreate["postId"],
            "name" => $commentToCreate["name"],
            "email" => $commentToCreate["email"]
        ]);
    }
}

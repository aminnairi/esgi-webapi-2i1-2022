<?php

class CommentModel
{
    public static function getAll()
    {
        include "./database/database-connection.php";
        $getCommentsQuery = $databaseConnection->query("SELECT * FROM comments;");
        $comments = $getCommentsQuery->fetchAll();
        return $comments;
    }

    public static function create($commentToCreate)
    {
        include "./database/database-connection.php";

        $createCommentQuery = $databaseConnection->prepare("INSERT INTO comments(postId, name, email) VALUES(:postId, :name, :email);");

        $createCommentQuery->execute([
            "postId" => $commentToCreate["postId"],
            "name" => $commentToCreate["name"],
            "email" => $commentToCreate["email"]
        ]);
    }
}

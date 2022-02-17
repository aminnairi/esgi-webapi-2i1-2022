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
}

<?php

class TodoModel
{
    public static function getAll()
    {
        include "./database/database-connection.php";
        $getTodosQuery = $databaseConnection->query("SELECT * FROM todos;");
        $todos = $getTodosQuery->fetchAll();
        return $todos;
    }
}

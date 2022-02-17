<?php

class UserModel
{
    public static function getAll()
    {
        include "./database/database-connection.php";
        $getUsersQuery = $databaseConnection->query("SELECT * FROM users;");
        $users = $getUsersQuery->fetchAll();

        return $users;
    }
}

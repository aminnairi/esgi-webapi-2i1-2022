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

    public static function create($userToCreate)
    {
        include "./database/database-connection.php";
        $name = $userToCreate["name"];
        $username = $userToCreate["username"];
        $email = $userToCreate["email"];
        $website = $userToCreate["website"];
        $phone = $userToCreate["phone"];
        $password = password_hash($userToCreate["password"], PASSWORD_BCRYPT);

        $createUserQuery = $databaseConnection->prepare("INSERT INTO users(name, username, email, phone, website, password) VALUES(:name, :username, :email, :phone, :website, :password);");

        $createUserQuery->execute([
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "phone" => $phone,
            "website" => $website,
            "password" => $password
        ]);
    }
}

<?php

include __DIR__ . "/../database/database-connection.php";

class UserModel
{
    public static function getAll()
    {
        $databaseConnection = Database::getConnection();
        $getUsersQuery = $databaseConnection->query("SELECT * FROM users;");
        $users = $getUsersQuery->fetchAll();

        return $users;
    }

    public static function create($userToCreate)
    {
        $databaseConnection = Database::getConnection();
        $name = $userToCreate["name"];
        $username = $userToCreate["username"];
        $email = $userToCreate["email"];
        $website = $userToCreate["website"];
        $phone = $userToCreate["phone"];
        $role = $userToCreate["role"];
        $password = password_hash($userToCreate["password"], PASSWORD_BCRYPT);

        $createUserQuery = $databaseConnection->prepare("INSERT INTO users(name, username, email, phone, website, password, role) VALUES(:name, :username, :email, :phone, :website, :password, :role);");

        $createUserQuery->execute([
            "name" => $name,
            "username" => $username,
            "email" => $email,
            "phone" => $phone,
            "website" => $website,
            "password" => $password,
            "role" => $role
        ]);
    }

    public static function findOneByToken(string $token)
    {
        $databaseConnection = Database::getConnection();
        $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE token = :token;");

        $getUserQuery->execute([
            "token" => $token
        ]);

        $user = $getUserQuery->fetch();

        return $user;
    }

    public static function findByEmail(string $email)
    {
        $databaseConnection = Database::getConnection();
        $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email");

        $getUserQuery->execute([
            "email" => $email
        ]);

        $user = $getUserQuery->fetch();

        return $user;
    }
}

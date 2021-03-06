<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../database/database-connection.php";

class Login
{
    public static function post()
    {
        $databaseConnection = Database::getConnection();
        $json = json_decode(file_get_contents("php://input"));
        $getUserQuery = $databaseConnection->prepare("SELECT password FROM users WHERE email = :email;");

        $getUserQuery->execute([
            "email" => $json->email
        ]);

        $user = $getUserQuery->fetch();

        if (!$user) {
            echo Response::json(400, ["Content-Type" => "application/json"], ["success" => false, "error" => "Bad credentials"]);
            die();
        }

        if (!password_verify($json->password, $user["password"])) {
            echo Response::json(400, ["Content-Type" => "application/json"], ["success" => false, "error" => "Bad credentials"]);
            die();
        }

        $token = bin2hex(random_bytes(16));

        $updateUserTokenQuery = $databaseConnection->prepare("UPDATE users SET token = :token WHERE email = :email;");

        $updateUserTokenQuery->execute([
            "email" => $json->email,
            "token" => $token
        ]);

        echo Response::json(200, ["Content-Type" => "application/json"], ["success" => true, "token" => $token]);
    }
}

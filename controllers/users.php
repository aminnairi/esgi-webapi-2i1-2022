<?php

include "./library/response.php";
include "./library/header.php";
include "./models/UserModel.php";

final class User
{
    /**
     * @example
     * User::get();
     */
    final public static function get(): void
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json",
        ];

        try {
            $token = Header::get("token", "notfound");
            $user = UserModel::findOneByToken($token);

            if (!$user) {
                echo Response::json(401, ["Content-Type" => "application/json"], ["success" => false, "error" => "Unauthorized"]);
                die();
            }

            $users = UserModel::getAll();
            $body = ["success" => true, "users" => $users];
            echo Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @example
     * User::post();
     */
    final public static function post(): void
    {
        $json = json_decode(file_get_contents("php://input"));

        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json"
        ];

        $body = [
            "success" => true
        ];

        UserModel::create([
            "name" => $json->name,
            "username" => $json->username,
            "email" => $json->email,
            "website" => $json->website,
            "phone" => $json->phone,
            "password" => $json->password
        ]);

        echo Response::json($statusCode, $headers, $body);
    }
}


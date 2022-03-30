<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../library/header.php";
include __DIR__ . "/../models/UserModel.php";
include __DIR__ . "/../library/number.php";

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
            $user = UserModel::findOneByToken(Header::get("token", "notfound"));

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

        try {
            $user = UserModel::findOneByToken(Header::get("token", "notfound"));

            if (!$user || $user["role"] !== "ADMINISTRATOR") {
                echo Response::json(401, ["Content-Type" => "application/json"], ["success" => true, "error" => "Unauthorized"]);
                die();
            }

            if (!property_exists($json, "name")) {
                die(Response::json(400, [], ["success" => false, "error" => "property name is mandatory"]));
            }

            if (!property_exists($json, "username")) {
                die(Response::json(400, [], ["success" => false, "error" => "property username is mandatory"]));
            }

            if (!property_exists($json, "email")) {
                die(Response::json(400, [], ["success" => false, "error" => "property email is mandatory"]));
            }

            if (!property_exists($json, "website")) {
                die(Response::json(400, [], ["success" => false, "error" => "property website is mandatory"]));
            }

            if (!property_exists($json, "phone")) {
                die(Response::json(400, [], ["success" => false, "error" => "property phone is mandatory"]));
            }

            if (!property_exists($json, "role")) {
                die(Response::json(400, [], ["success" => false, "error" => "property role is mandatory"]));
            }

            if (!property_exists($json, "password")) {
                die(Response::json(400, [], ["success" => false, "error" => "property password is mandatory"]));
            }

            if (gettype($json->name) !== "string") {
                die(Response::json(400, [], ["success" => false, "error" => "property name is not a string"]));
            }

            if (gettype($json->username) !== "string") {
                die(Response::json(400, [], ["success" => false, "error" => "property username is not a string"]));
            }

            if (gettype($json->email) !== "string") {
                die(Response::json(400, [], ["success" => false, "error" => "property email is not a string"]));
            }

            if (gettype($json->website) !== "string") {
                die(Response::json(400, [], ["success" => false, "error" => "property website is not a string"]));
            }

            if (gettype($json->phone) !== "string") {
                die(Response::json(400, [], ["success" => false, "error" => "property phone is not a string"]));
            }

            if (gettype($json->role) !== "string" ) {
                die(Response::json(400, [], ["success" => false, "error" => "property role is not a string"]));
            }

            if (gettype($json->password) !== "string" ) {
                die(Response::json(400, [], ["success" => false, "error" => "property password is not a string"]));
            }

            if (!Number::between(1, 25, strlen($json->name))) {
                die(Response::json(400, [], ["success" => false, "error" => "property name should be betweeen 1 & 25 characters"]));
            }

            $foundUser = UserModel::findByEmail($json->email);

            if ($foundUser) {
                die(Response::json(400, [], ["success" => false, "error" => "email address already in use"]));
            }

            UserModel::create([
                "name" => $json->name,
                "username" => $json->username,
                "email" => $json->email,
                "website" => $json->website,
                "phone" => $json->phone,
                "role" => $json->role,
                "password" => $json->password
            ]);

            echo Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            echo Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }

    }
}


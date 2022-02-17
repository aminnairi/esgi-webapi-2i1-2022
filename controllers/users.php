<?php

include "./library/response.php";

$driver = "mysql";
$databaseName = "esgi-webapi-2022-2i1";
$host = "localhost";
$dsn = "$driver:dbname=$databaseName;host=$host";
$user = "root";
$password = "root";

$databaseConnection = new PDO($dsn, $user, $password);

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
            "X-Amin" => "Hello"
        ];

        $users = [
            [
                "id" => 1,
                "username" => "aminnairi"
            ]
        ];

        $body = [
            "success" => true,
            "users" => $users
        ];

        echo Response::json($statusCode, $headers, $body);
    }

    /**
     * @example
     * User::post();
     */
    final public static function post(): void
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json"
        ];

        $body = [
            "success" => true
        ];

        echo Response::json($statusCode, $headers, $body);
    }
}


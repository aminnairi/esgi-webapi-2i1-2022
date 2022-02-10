<?php

include "./library/response.php";

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


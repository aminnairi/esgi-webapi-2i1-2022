<?php

include "./library/response.php";
include "./models/TodoModel.php";

final class Todo
{
    /**
     * @example
     * Todo::get();
     */
    final public static function get(): void
    {
        $statusCode = 200;

        $headers = [
            "Content-Type" => "application/json"
        ];

        try {
            $user = UserModel::findOneByToken(Header::get("token", "notfound"));

            if (!$user) {
                echo Response::json(401, ["Content-Type" => "application/json"], ["success" => true, "error" => "Unauthorized"]);
                die();
            }

            $todos = TodoModel::getAll();
            $body = ["success" => true, "todos" => $todos];
            echo Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @example
     * Todo::post();
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

        $user = UserModel::findOneByToken(Header::get("token", "notfound"));

        if (!$user || $user["role"] !== "ADMINISTRATOR") {
            echo Response::json(401, ["Content-Type" => "application/json"], ["success" => true, "error" => "Unauthorized"]);
            die();
        }

        TodoModel::create([
            "userId" => $json->userId,
            "title" => $json->title,
            "completed" => $json->completed
        ]);

        echo Response::json($statusCode, $headers, $body);
    }
}

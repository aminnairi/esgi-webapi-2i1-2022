<?php

include "./library/response.php";
include "./models/CommentModel.php";

final class Comment
{
    /**
     * @example
     * Comment::get();
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

            $comments = CommentModel::getAll();
            $body = ["success" => true, "comments" => $comments];
            echo Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @example
     * Comment::post();
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

        CommentModel::create([
            "postId" => $json->postId,
            "name" => $json->name,
            "email" => $json->email
        ]);

        echo Response::json($statusCode, $headers, $body);
    }
}

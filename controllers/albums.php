<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/AlbumModel.php";

final class Album
{
    /**
     * @example
     * Album::get();
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

            $albums = AlbumModel::getAll();
            $body = ["success" => true, "albums" => $albums];
            echo Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @example
     * Album::post();
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

        AlbumModel::create([
            "userId" => $json->userId,
            "title" => $json->title
        ]);

        echo Response::json($statusCode, $headers, $body);
    }
}


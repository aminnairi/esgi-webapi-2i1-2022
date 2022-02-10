<?php

/**
 * @see https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op
 */
$route = $_REQUEST["route"] ?? "home";

/**
 * @see https://www.php.net/manual/en/reserved.variables.server.php
 */
$method = $_SERVER["REQUEST_METHOD"];

if ($route === "users") {
    include "./controllers/users.php";

    if ($method === "GET") {
        User::get();
    } else {
        echo "Introuvable";
    }
} else if ($route === "posts") {
    include "./controllers/posts.php";

    if ($method === "GET") {
        Post::get();
    } else {
        echo "Introuvable";
    }
} else if ($route === "comments") {
    include "./controllers/comments.php";

    if ($method === "GET") {
        Comment::get();
    }
} else if ($route === "todos") {
    include "./controllers/todos.php";

    if ($method === "GET") {
        Todo::get();
    } else {
        echo "Introuvable";
    }
} else if ($route === "albums") {
    include "./controllers/albums.php";

    if ($method === "GET") {
        Album::get();
    } else {
        echo "Introuvable";
    }
} else {
    echo "Introuvable";
}

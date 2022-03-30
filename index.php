<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * @see https://www.php.net/manual/en/migration70.new-features.php#migration70.new-features.null-coalesce-op
 */
$route = $_REQUEST["route"] ?? "home";

/**
 * @see https://www.php.net/manual/en/reserved.variables.server.php
 */
$method = $_SERVER["REQUEST_METHOD"];

if ($route === "login") {
    include "./controllers/login.php";

    if ($method === "POST") {
        Login::post();
        die();
    }
}

if ($route === "users") {
    include "./controllers/users.php";

    if ($method === "GET") {
        User::get();
        die();
    }

    if ($method === "POST") {
        User::post();
        die();
    }
}

if ($route === "posts") {
    include "./controllers/posts.php";

    if ($method === "GET") {
        Post::get();
        die();
    }

    if ($method === "POST") {
        Post::posts();
        die();
    }
}

if ($route === "comments") {
    include "./controllers/comments.php";

    if ($method === "GET") {
        Comment::get();
        die();
    }

    if ($method === "POST") {
        Comment::post();
        die();
    }
}

if ($route === "todos") {
    include "./controllers/todos.php";

    if ($method === "GET") {
        Todo::get();
        die();
    }

    if ($method === "POST") {
        Todo::post();
        die();
    }
}

if ($route === "albums") {
    include "./controllers/albums.php";

    if ($method === "GET") {
        Album::get();
        die();
    }

    if ($method === "POST") {
        Album::post();
        die();
    }
}

if ($route === "photos") {
    include "./controllers/photos.php";

    if ($method === "GET") {
        Photo::get();
        die();
    }

    if ($method === "POST") {
        Photo::post();
        die();
    }
}

// Retourner le bon code de status
// Retourner une réponse au format JSON
echo "Introuvable";

// Modifier les chemins d'inclusions pour utiliser un chemin correct avec __DIR__


// Toutes les routes (sauf login) doivent rendre l'authentification obligatoire
// Toutes les routes (sauf login) il n'y ait que l'utilisateur ayant le role ADMINISTRATOR qui puisse envoyer des requêtes

// Vous vérifiez que tous les paramètres soient corrects
// Email -> vérifier qu'il existe, qu'il ait un bon format
// Prénom -> vérifier qu'il existe, qu'il ait une taille similaire à ce qu'on a mis sur le fichier initialization.sql

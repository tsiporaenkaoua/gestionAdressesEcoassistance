<?php

require_once "core/autoload.php";
require_once "config/database.php";

// indique au client que les réponses seront au format JSON
header("Content-Type: application/json");

// Message d'accueil pour la route de base /api
if ($_SERVER['REQUEST_URI'] === "/api" || $_SERVER['REQUEST_URI'] === "/api/") {
    echo json_encode(["message" => "API ECOASSISTANCE"]);
    exit;
}

// Découpage de l'URL
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// On enlève "api"
if ($uri[0] === "api") {
    array_shift($uri);
}

// recupere la méthode HTTP = get, post...
$method = $_SERVER['REQUEST_METHOD'];

// Liste des routes disponibles
$routes = [
    "adresses"      => "AdresseController",
    "gestionnaires" => "GestionnaireController",
    "syndics"       => "SyndicController"
];

// Vérifie que la route existe
$entity = $uri[0] ?? null;

if (!isset($routes[$entity])) {
    http_response_code(404);
    echo json_encode(["error" => "Route introuvable"]);
    exit;
}

// ID éventuel
$id = $uri[1] ?? null;

// Instanciation dynamique du controller
$controllerName = $routes[$entity];
$controller = new $controllerName($pdo);

// Routage dynamique
switch($method){
    case "GET":
        $id ? $controller->show($id) : $controller->index();
        break;

    case "POST":
        $controller->store();
        break;

    case "PUT":
        $controller->update($id);
        break;

    case "DELETE":
        $controller->delete($id);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
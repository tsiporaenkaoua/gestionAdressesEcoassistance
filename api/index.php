<?php

require_once "core/autoload.php";
require_once "config/database.php";

header("Content-Type: application/json");

// Message d'accueil
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

$entity = $uri[0] ?? null;
$id1    = $uri[1] ?? null;
$id2    = $uri[2] ?? null;

// Liste des routes
$routes = [
    "adresses"            => "AdresseController",
    "gestionnaires"       => "GestionnaireController",
    "syndics"             => "SyndicController",
    "gestionnairesSyndics" => "GestionnaireSyndicController"
];

// Vérification de la route
if (!isset($routes[$entity])) {
    http_response_code(404);
    echo json_encode(["error" => "Route introuvable"]);
    exit;
}

// Instanciation du controller
$controllerName = $routes[$entity];
$controller = new $controllerName($pdo);

// Méthode HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Gestion des routes avec 2 IDs (clé composite)
if ($entity === "gestionnairesSyndic") {

    switch ($method) {

        case "GET":
            if ($id1 && $id2) {
                $controller->show($id1, $id2);
            } elseif ($id1) {
                $controller->showByGestionnaire($id1);
            } elseif ($id2) {
                $controller->showBySyndic($id2);
            } else {
                $controller->index();
            }
            break;

        case "POST":
            $controller->store();
            break;

        case "PUT":
            $controller->update($id1, $id2);
            break;

        case "DELETE":
            $controller->delete($id1, $id2);
            break;
    }

    exit;
}

// Routes classiques (1 ID)
switch ($method) {

    case "GET":
        $id1 ? $controller->show($id1) : $controller->index();
        break;

    case "POST":
        $controller->store();
        break;

    case "PUT":
        $controller->update($id1);
        break;

    case "DELETE":
        $controller->delete($id1);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
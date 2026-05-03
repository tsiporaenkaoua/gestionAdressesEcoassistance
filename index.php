<?php
require_once "core/autoload.php";
require_once "config/database.php";

// Simple router for API
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if (strpos($request, '/api/syndic') === 0) {
    $controller = new SyndicController($pdo);
    $path = str_replace('/api/syndic', '', $request);
    $path = trim($path, '/');

    if ($method === 'GET') {
        if ($path === '' || $path === 'index') {
            $controller->index();
        } elseif (is_numeric($path)) {
            $controller->show((int)$path);
        }
    } elseif ($method === 'POST') {
        $controller->create();
    } elseif ($method === 'PUT' && is_numeric($path)) {
        $controller->update((int)$path);
    } elseif ($method === 'DELETE' && is_numeric($path)) {
        $controller->delete((int)$path);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
    }
} elseif (strpos($request, '/api/adresse') === 0) {
    // Similar for AdresseController if implemented
    echo json_encode(['message' => 'Adresse API not implemented yet']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'API endpoint not found']);
}
?>




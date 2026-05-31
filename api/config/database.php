<?php

$host = "localhost";
$dbname = "ecoassistance";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Suppression de l'echo qui casse le JSON
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
    
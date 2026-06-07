<?php

require_once __DIR__ . '/../core/autoload.php';

$faker = Faker\Factory::create('fr_FR');

// Connexion BDD
$pdo = new PDO("mysql:host=localhost;dbname=ecoassistance;charset=utf8", "root", "");

// Générer 20 syndics
for ($i = 0; $i < 20; $i++) {

    $raisonSociale = $faker->company();
    $siret = $faker->numerify('##############'); // 14 chiffres
    $adresse = $faker->streetAddress();
    $codePostal = $faker->postcode();
    $ville = $faker->city();
    $actif = $faker->boolean(); // 0 ou 1

    $stmt = $pdo->prepare("
        INSERT INTO syndic (raisonSociale, siret, adresse, codePostal, ville, actif)
        VALUES (:raisonSociale, :siret, :adresse, :codePostal, :ville, :actif)
    ");

    $stmt->execute([
        ':raisonSociale' => $raisonSociale,
        ':siret' => $siret,
        ':adresse' => $adresse,
        ':codePostal' => $codePostal,
        ':ville' => $ville,
        ':actif' => $actif
    ]);
}

echo ("20 syndics générés avec succès !");

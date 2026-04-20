<?php
require_once "core/autoload.php";
require_once "config/database.php";


$gestionnaireModel = new GestionnaireModel($pdo);
$gestionnaire1 = new Gestionnaire(1, "Monteau", "Jacques", true);
$gestionnaireModel->createGestionnaire($gestionnaire1); 
$gestionnaires = $gestionnaireModel->getAllGestionnaires();
foreach($gestionnaires as $gestionnaire){
    echo "ID: " . $gestionnaire['idGestionnaire'] . "<br>";
    echo "Nom: " . $gestionnaire['nom'] . "<br>";
    echo "Prénom: " . $gestionnaire['prenom'] . "<br>";
    echo "Actif: " . ($gestionnaire['actif'] ? 'Oui' : 'Non') . "<br><hr>";


$adresseModel = new AdresseModel($pdo);
$adresse1= new Adresse(1, "123 Rue de la Paix", "75000", "Paris", 6);
$adresseModel->createAdresse($adresse1);
$adresses = $adresseModel->getAllAdresses();
foreach($adresses as $adresse){
    echo "ID: " . $adresse['idAdresse'] . "<br>";
    echo "Adresse: " . $adresse['adresse'] . "<br>";
    echo "Code Postal: " . $adresse['codePostal'] . "<br>";
    echo "Ville: " . $adresse['ville'] . "<br>";
    echo "ID Gestionnaire: " . $adresse['idGestionnaire'] . "<br><hr>";

    //Verifier lorsque l'on crée une adresse qu'elle est associée a un gestionnaire qui es bien dans notre base
}

}
<?php
    require_once "core/autoload.php";
    require_once "config/database.php";

    // creation du modele gestionnaire 
    $gestionnaireModel = new GestionnaireModel($pdo);
    // creation de l'objet gestionnaire
    $gestionnaire1 = new Gestionnaire(1, "Monteau", "Jacques", true);
    // insertion du gestionnaire dans la base de données
    $gestionnaireModel->createGestionnaire($gestionnaire1); 
    $gestionnaires = $gestionnaireModel->getAllGestionnaires();
    foreach($gestionnaires as $gestionnaire){
        echo "ID: " . $gestionnaire['idGestionnaire'] . "<br>";
        echo "Nom: " . $gestionnaire['nom'] . "<br>";
        echo "Prénom: " . $gestionnaire['prenom'] . "<br>";
        echo "Actif: " . ($gestionnaire['actif'] ? 'Oui' : 'Non') . "<br><hr>";

    }

    $adresseModel = new AdresseModel($pdo);
    $adresse1= new Adresse(1, "3 Rue de la rose", "75000", "Paris", 6);
    $adresseModel->createAdresse($adresse1);
    $adresses = $adresseModel->getAllAdresses();
    foreach($adresses as $adresse){
        echo "ID: " . $adresse['idAdresse'] . "<br>";
        echo "Adresse: " . $adresse['adresse'] . "<br>";
        echo "Code Postal: " . $adresse['codePostal'] . "<br>";
        echo "Ville: " . $adresse['ville'] . "<br>";
        echo "ID Gestionnaire: " . $adresse['idGestionnaire'] . "<br><hr>";
    }

    $syndicModel = new SyndicModel($pdo);
    $syndic1 = new Syndic(5, "Syndic BfffC", "98765432109876", "4 Avenue des Champs-Élysées", "75000", "Paris", true);
    $syndicModel->createSyndic($syndic1);
    $syndics = $syndicModel->getAllSyndic();
    foreach($syndics as $syndic){   
        echo "ID: " . $syndic['idSyndic'] . "<br>";
        echo "Raison Sociale: " . $syndic['raisonSociale'] . "<br>";        
        echo "Siret: " . $syndic['siret'] . "<br>";
        echo "Adresse: " . $syndic['adresse'] . "<br>";
        echo "Code Postal: " . $syndic['codePostal'] . "<br>";
        echo "Ville: " . $syndic['ville'] . "<br>";
        echo "Actif: " . ($syndic['actif'] ? 'Oui' : 'Non') . "<br><hr>";
    }


    $operationModel = new OperationModel($pdo);
    $operation1 = new Operation(1, "Points Singuliers");
    $operationModel->createOperation($operation1);
    $operations = $operationModel->getAllOperations();
    foreach($operations as $operation){
        echo "ID: " . $operation['idOperation'] . "<br>";
        echo "Nom: " . $operation['nom'] . "<br>";
        echo "<hr>";
    }   
    //Verifier lorsque l'on crée une adresse qu'elle est associée a un gestionnaire qui es bien dans notre base
    // $syndicModel = new SyndicModel($pdo); etc qu'une seul fois dans notre code on le mettra au niv des controller




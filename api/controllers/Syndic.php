<?php

class SyndicController {
    private $syndicModel;

    // INITIALISATION DE LA CLASSE SYNDIC CONTROLLER
    public function __construct($pdo) {
        $this->syndicModel = new SyndicModel($pdo);
    }

    // GET /syndic - afficher la liste des syndics
    public function index() {
        $syndics = $this->syndicModel->getAllSyndic();
        include 'views/syndic/liste_syndics.php';
    }

    // GET/POST /syndic/create - créer un syndic
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier que toutes les données requises sont présentes
            if (!isset($_POST['raisonSociale']) || !isset($_POST['siret']) || !isset($_POST['adresse']) || !isset($_POST['codePostal']) || !isset($_POST['ville'])) {
                $error = 'Données manquantes';
                include 'views/syndic/ajouter_syndic.php';
                return;
            }
            
            $syndic = new Syndic(
                null, 
                $_POST['raisonSociale'], 
                $_POST['siret'], 
                $_POST['adresse'], 
                $_POST['codePostal'], 
                $_POST['ville'], 
                true
            );
            
            $result = $this->syndicModel->createSyndic($syndic);
            
            if ($result) {
                header('Location: /syndic');
            } else {
                $error = 'Erreur lors de la création';
                include 'views/syndic/ajouter_syndic.php';
            }
        } else {
            // Afficher le formulaire
            include 'views/syndic/ajouter_syndic.php';
        }
    }

    // GET /syndic/1 - afficher un syndic par ID
    public function show($id) {
        $syndic = $this->syndicModel->getSyndic($id);
        
        if ($syndic) {
            include 'views/syndic/detail_syndic.php';
        } else {
            http_response_code(404);
            include 'views/errors/404.php';
        }
    }

    // GET/POST /syndic/1/update - mettre à jour un syndic
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier que toutes les données requises sont présentes
            if (!isset($_POST['raisonSociale']) || !isset($_POST['siret']) || !isset($_POST['adresse']) || !isset($_POST['codePostal']) || !isset($_POST['ville'])) {
                $error = 'Données manquantes';
                $syndic = $this->syndicModel->getSyndic($id);
                include 'views/syndic/modifier_syndic.php';
                return;
            }
            
            $syndic = new Syndic(
                $id, 
                $_POST['raisonSociale'], 
                $_POST['siret'], 
                $_POST['adresse'], 
                $_POST['codePostal'], 
                $_POST['ville'], 
                true
            );
            
            $result = $this->syndicModel->updateSyndic($syndic);
            
            if ($result) {
                header('Location: /syndic');
            } else {
                $error = 'Erreur lors de la mise à jour';
                include 'views/syndic/modifier_syndic.php';
            }
        } else {
            // Afficher le formulaire pré-rempli
            $syndic = $this->syndicModel->getSyndic($id);
            if ($syndic) {
                include 'views/syndic/modifier_syndic.php';
            } else {
                http_response_code(404);
                include 'views/errors/404.php';
            }
        }
    }

    // POST /syndic/1/delete - supprimer un syndic
    public function delete($id) {
        $result = $this->syndicModel->deleteSyndic($id);
        
        if ($result) {
            header('Location: /syndic');
        } else {
            $error = 'Erreur lors de la suppression';
            include 'views/syndic/liste_syndics.php';
        }
    }
}
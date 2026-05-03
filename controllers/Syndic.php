<?php

class SyndicController {
    private $syndicModel;

    public function __construct($pdo) {
        $this->syndicModel = new SyndicModel($pdo);
    }

    public function index() {
        $syndics = $this->syndicModel->getAllSyndic();
        header('Content-Type: application/json');
        echo json_encode($syndics);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $syndic = new Syndic(null, $data['raisonSociale'], $data['siret'], $data['adresse'], $data['codePostal'], $data['ville'], true);
        $result = $this->syndicModel->createSyndic($syndic);
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    }

    public function show($id) {
        $syndic = $this->syndicModel->getSyndic($id);
        header('Content-Type: application/json');
        echo json_encode($syndic);
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $syndic = new Syndic($id, $data['raisonSociale'], $data['siret'], $data['adresse'], $data['codePostal'], $data['ville'], true);
        $result = $this->syndicModel->updateSyndic($syndic);
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    }

    public function delete($id) {
        $result = $this->syndicModel->deleteSyndic($id);
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    }
}
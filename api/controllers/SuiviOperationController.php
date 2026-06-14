<?php

class SuiviOperationController{
    private $model;
    private $service;

    public function __construct($pdo) {
        $this->model = new SuiviOperationModel($pdo);
        $this->service = new SuiviOperationService();
    }

    public function index() {
        echo json_encode($this->model->getAll());
    }

    public function show($idAdresse, $idOperation) {
        echo json_encode($this->model->getByIds($idAdresse, $idOperation));
    }

    public function showByAdresse($idAdresse) {
        echo json_encode($this->model->getByAdresse($idAdresse));
    }

    public function showByOperation($idOperation) {
        echo json_encode($this->model->getByOperation($idOperation));
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->service->checkDuplicate($this->model, $data);
        $this->model->create($data);
        echo json_encode(["success" => true]);
    }

    public function update($idAdresse, $idOperation) {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->model->update($idAdresse, $idOperation, $data);
        echo json_encode(["success" => true]);
    }

    public function delete($idAdresse, $idOperation) {
        $this->model->delete($idAdresse, $idOperation);
        echo json_encode(["success" => true]);
    }

    public function showByFirstId($idAdresse){
        return $this->showByAdresse($idAdresse);
    }

    public function showBySecondId($idOperation) {
    return $this->showByOperation($idOperation);
    }
}

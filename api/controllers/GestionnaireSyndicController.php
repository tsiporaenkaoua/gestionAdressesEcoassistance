<?php
class GestionnaireSyndicController {

    private $model;
    private $service;

    public function __construct($pdo) {
        $this->model = new GestionnaireSyndicModel($pdo);
        $this->service = new GestionnaireSyndicService();
    }

    public function index() {
        echo json_encode($this->model->getAll());
    }

    public function show($idGestionnaire, $idSyndic) {
        echo json_encode($this->model->getByIds($idGestionnaire, $idSyndic));
    }

    public function showByGestionnaire($idGestionnaire) {
        echo json_encode($this->model->getByGestionnaire($idGestionnaire));
    }

    public function showBySyndic($idSyndic) {
        echo json_encode($this->model->getBySyndic($idSyndic));
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->service->checkDuplicate($this->model, $data);
        $this->model->create($data);
        echo json_encode(["success" => true]);
    }

    public function update($idGestionnaire, $idSyndic) {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->model->updateGestionnaireSyndic($idGestionnaire, $idSyndic, $data);
        echo json_encode(["success" => true]);
    }

    public function delete($idGestionnaire, $idSyndic) {
        $this->model->deleteGestionnaireSyndic($idGestionnaire, $idSyndic);
        echo json_encode(["success" => true]);
    }

    public function showByFirstId($idGestionnaire){
        return $this->showByGestionnaire($idGestionnaire);
    }

    public function showBySecondId($id) {
    return $this->showBySyndic($id);
}
}
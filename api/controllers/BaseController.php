<?php
class BaseController {

    protected $model;
    protected $service;

    public function index(){
        echo json_encode($this->model->getAll());
    }

    public function show($id){
        echo json_encode($this->model->getById($id));
    }

    public function store(){
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->model->create($data);
        echo json_encode(["success" => true]);
    }

    public function update($id){
        $data = json_decode(file_get_contents("php://input"), true);
        $this->service->validate($data);
        $this->model->update($id, $data);
        echo json_encode(["success" => true]);
    }

    public function delete($id){
        $this->model->delete($id);
        echo json_encode(["success" => true]);
    }
}
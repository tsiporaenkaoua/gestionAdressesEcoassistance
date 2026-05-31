<?php

class GestionnaireController extends BaseController {
    public function __construct($pdo){
        $this->model = new GestionnaireModel($pdo);
        $this->service = new GestionnaireService();
    }
}
<?php

class AdresseController extends BaseController {
    public function __construct($pdo){
        $this->model = new AdresseModel($pdo);
        $this->service = new AdresseService();
    }
}
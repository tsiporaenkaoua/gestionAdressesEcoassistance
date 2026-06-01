<?php

class SyndicController extends BaseController {
    public function __construct($pdo){
        $this->model = new SyndicModel($pdo);
        $this->service = new SyndicService();
    }
}
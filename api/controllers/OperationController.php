<?php

class OperationController extends BaseController{

     public function __construct($pdo){
        $this->model = new OperationModel($pdo);
        $this->service = new OperationService();
    }
}
   

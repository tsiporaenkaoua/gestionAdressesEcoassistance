<?php

class Operation extends BaseController{

     public function __construct($pdo){
        $this->model = new OperationModel($pdo);
        $this->service = new OperationService();
    }
}
   

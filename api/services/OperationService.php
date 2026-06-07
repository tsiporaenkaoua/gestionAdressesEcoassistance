<?php

Class OperationService{

    public function validate(array &$data){
        if (!isset($data['nom']) || trim($data['nom']) === ''){
            throw new Exception ("Les champs nom doit etre rempli");
        }

        $data['nom'] = trim($data['nom']);

        return true;
        
    }
}
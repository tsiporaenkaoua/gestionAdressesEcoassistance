<?php

Class SuiviOperationService{

    //Verifier qu'on a bien (isset) les variables obligatoires
    public function validate(array &$data):void{ 
        $required = ['statut', 'dateIntervention'];

        foreach($required as $field){
            if (!isset($data[$field]) || trim($data[$field]) === ''){ //empty permet le isset et le trim en meme temps mais considere les 0 comme nul
                throw new Exception("le champ $field est obligatoire");
            }
        }
        
        // normaliser les données
        $data['statut'] =trim($data['statut']);
        $data['dateIntervention'] =trim($data['dateIntervention']);

        

        //verifier le statut 
        $choice = ['INFAISABLE', 'EN_COURS', 'A_FAIRE', 'TERMINE'];
        if (!in_array($data['statut'], $choice)) {
            throw new Exception(
                "Le champ statut doit avoir l'une des valeurs suivantes : "
                . implode(', ', $choice)
            );
        }

        //verifier que date bon format
        $dateObj = DateTime::createFromFormat('Y-m-d', $data['dateIntervention']);
        if (!$dateObj || $dateObj->format('Y-m-d') !== $data['dateIntervention']) { 
            throw new Exception("Date d'intervention invalide"); 
        }

        if(isset($data['dateFinIntervention'])){
            $data['dateFinIntervention'] =trim($data['dateFinIntervention']);

            $dateObj = DateTime::createFromFormat('Y-m-d', $data['dateFinIntervention']);
            if (!$dateObj || $dateObj->format('Y-m-d') !== $data['dateFinIntervention']) { 
                throw new Exception("Date de fin d'intervention invalide"); 
            }

            if (strtotime($data['dateFinIntervention']) <strtotime($data['dateIntervention'])) {
                throw new Exception(
                    "La date de fin doit être postérieure à la date d'intervention"
                );
            }
        }
    }
        
    //verifier que la relation entre les deux id existe
    public function checkDuplicate(SuiviOperationModel $model, array $data):void{
        if($model->existsAdresseOperation($data['idAdresse'],$data['idOperation'])){
            throw new Exception("Cette opération existe déjà pour ce service !");
        }
    }
    
}


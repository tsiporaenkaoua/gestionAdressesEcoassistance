<?php

class SuiviOperationModel{
    private $idAdresse;
    private $statut;
    private $dateIntervention;
    private $dateFinIntervention;
    private $idOperation;
 

    public function __construct($idAdresse, $statut,$dateIntervention,$dateFinIntervention,$idOperation){
        $this->idAdresse = $idAdresse;
        $this->statut = $statut;
        $this->dateIntervention = $dateIntervention;
        $this->dateFinIntervention = $dateFinIntervention;
        $this->idOperation = $idOperation;
    }

    public function getIdAdresse(){
        return $this->idAdresse;        
    }
    public function getStatut(){
        return $this->statut;        
    }
    public function getDateIntervention(){
        return $this->dateIntervention;        
    }
    public function getDateFinIntervention(){
        return $this->dateFinIntervention;        
    }
    public function getIdOperation(){
        return $this->idOperation;        
    }
}
<?php

class SuiviOperation{
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
    public function setStatut($statut){
        $this->statut = $statut;        
    }
    public function setDateIntervention($dateIntervention){
        $this->dateIntervention = $dateIntervention;        
    }
    public function setDateFinIntervention($dateFinIntervention){
        $this->dateFinIntervention = $dateFinIntervention;        
    }
    public function setIdOperation($idOperation){
        $this->idOperation = $idOperation;        
    }
    public function __toString(){
        return "SuiviOperation [idAdresse=" . $this->idAdresse . ", statut=" . $this->statut . ", dateIntervention=" . $this->dateIntervention . ", dateFinIntervention=" . $this->dateFinIntervention . ", idOperation=" . $this->idOperation . "]";
    }
}
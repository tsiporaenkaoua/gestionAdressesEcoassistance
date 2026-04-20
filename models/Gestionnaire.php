<?php

class Gestionnaire{

    private $idGestionnaire;
    private $nom;
    private $prenom;
    private $actif;

    public  function __construct($idGestionnaire, $nom, $prenom, $actif){
        $this->idGestionnaire = $idGestionnaire;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->actif = $actif;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function isActif(){
        return $this->actif;
    }
    
}
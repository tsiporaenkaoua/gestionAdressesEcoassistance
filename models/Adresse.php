<?php

class Adresse{

private $idAdresse;
private $adresse;
private $codePostal;
private $ville;
private $idGestionnaire;

public function __construct($idAdresse, $adresse, $codePostal,$ville,$idGestionnaire){
    $this->idAdresse = $idAdresse;
    $this->adresse = $adresse;
    $this->codePostal = $codePostal;
    $this->ville = $ville;
    $this->idGestionnaire = $idGestionnaire; // TRANSFORMER EN getGestionnaire PLUS TARD
}

public function getIdAdresse(){
    return  $this->idAdresse;
}
public function getAdresse(){
    return  $this->adresse;
}
public function getCodePostal(){
    return  $this->codePostal;
}
public function getVille(){
    return   $this->ville;
}
public function getIdGestionnaire(){
    return   $this->idGestionnaire;
}

//setters
public function setAdresse(){

}
//toString
}
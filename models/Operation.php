<?php
class Operation{

private $idOperation;	
private $nom;

public function __construct($idOperation, $nom){
    $this->idOperation = $idOperation;
    $this->nom = $nom;
}

public function getIdOperation(){
    return $this->idOperation;
}

public function getNom(){
    return $this->nom;
}
}
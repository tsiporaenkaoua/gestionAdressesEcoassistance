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

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function __toString(){
        return "Operation [idOperation=" . $this->idOperation . ", nom=" . $this->nom . "]";
    }
}
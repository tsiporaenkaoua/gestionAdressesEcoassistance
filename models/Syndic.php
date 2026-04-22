<?php
class Syndic{
    private $idSyndic;
    private $raisonSociale;
    private	$siret;
    private	$adresse;
    private	$codePostal;
    private	$ville;
    private	$actif;

   public function __construct($idSyndic,$raisonSociale,$siret,$adresse,$codePostal,$ville,$actif) {
        $this->idSyndic = $idSyndic;
        $this->raisonSociale = $raisonSociale;
        $this->siret = $siret;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->actif = $actif;
    }

    public function getIdSyndic(){
        return  $this->idSyndic;
    }
    public function getRaisonSociale(){
        return  $this->raisonSociale;
    }
    public function getSiret(){
        return  $this->siret;
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
    public function isActif(){
        return   $this->actif;
   }
}
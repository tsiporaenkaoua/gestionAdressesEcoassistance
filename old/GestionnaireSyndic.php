<?php
class GestionnaireSyndic{
    private $idGestionnaire;
    private $idSyndic;
    private $mail;	
    private $tel;
    
    public function __construct($idGestionnaire,$idSyndic,$mail,$tel){
        $this->idGestionnaire = $idGestionnaire;
        $this->idSyndic = $idSyndic;	
        $this->mail = $mail;
        $this->tel = $tel;
    }

    public function getIdGestionnaire(){
        return $this->idGestionnaire;
    }
    public function getIdSyndic(){
        return $this->idSyndic;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTel(){
        return $this->tel;
    }

    public function setMail($email){
         $this->mail = $email;
    }
    public function setTel($telephone){
        $this->tel = $telephone;
    }

    public function toString(){
        return "GestionnaireSyndic [ idGestionnaire = ". $this->idGestionnaire." idSyndic = ".$this->idSyndic." mail = ".$this->mail." tel = ".$this->tel." ]";
    }
} 

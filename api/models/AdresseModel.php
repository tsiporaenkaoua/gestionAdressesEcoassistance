<?php

class AdresseModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    //CREATE S-P-E
    public function create(array $data){
        $sql = "INSERT INTO adresse (adresse, codePostal, ville, idGestionnaire) 
                VALUES (:adresse,:codePostal,:ville,:idGestionnaire)";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':adresse' => $data['adresse'],
            ':codePostal' => $data['codePostal'],
            ':ville' => $data['ville'],
            ':idGestionnaire' => $data['idGestionnaire']
        ]);
    } 

    //READ ALL S-P-E-F
    public function getAll(){
        $sql = "SELECT * FROM adresse";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
 
    //READ ONE S-P-E-F
    public function getById($id){
        $sql = "SELECT * FROM adresse WHERE idAdresse = :idAdresse";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idAdresse' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   
    //UPDATE S-P-E
    public function update($id, array $data){
        $sql= "UPDATE adresse
                SET adresse = :adresse,	codePostal = :codePostal, ville = :ville, idGestionnaire = :idGestionnaire
                WHERE idAdresse = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':adresse' => $data['adresse'],
            ':codePostal' => $data['codePostal'],
            ':ville' => $data['ville'],
            ':idGestionnaire' => $data['idGestionnaire'],
            ':id' => $id
        ]);
    }
    //DELETE  S - P - E
    public function delete( $id){
        $sql = "DELETE FROM adresse WHERE idAdresse = :idAdresse";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idAdresse'=> $id]);


    }
}


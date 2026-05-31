<?php

class SuiviOperationModel{
    private $pdo;
 

    public function __construct($pdo){
        $this->pdo = $pdo;
    }   

    public function createSuiviOperation(array $data){
        $sql = "INSERT INTO suiviOperation (idAdresse, statut, dateIntervention, dateFinIntervention, idOperation) VALUES (:idAdresse, :statut, :dateIntervention, :dateFinIntervention, :idOperation)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idAdresse' => $data['idAdresse'],
            ':statut' => $data['statut'],
            ':dateIntervention' => $data['dateIntervention'],
            ':dateFinIntervention' => $data['dateFinIntervention'],
            ':idOperation' => $data['idOperation']
        ]);
    }

    public function getAllSuiviOperations(){
        $sql = "SELECT * FROM suiviOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSuiviOperation($idSuiviOperation){
        $sql = "SELECT * FROM suiviOperation WHERE idSuiviOperation = :idSuiviOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idSuiviOperation' => $idSuiviOperation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSuiviOperation(array $data){
        $sql = "UPDATE suiviOperation SET idAdresse = :idAdresse, statut = :statut, dateIntervention = :dateIntervention, dateFinIntervention = :dateFinIntervention, idOperation = :idOperation WHERE idSuiviOperation = :idSuiviOperation";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idAdresse' => $data['idAdresse'],
            ':statut' => $data['statut'],
            ':dateIntervention' => $data['dateIntervention'],
            ':dateFinIntervention' => $data['dateFinIntervention'],
            ':idOperation' => $data['idOperation'],
            ':idSuiviOperation' => $data['idSuiviOperation']
        ]);
    }

    public function deleteSuiviOperation($idSuiviOperation){
        $sql = "DELETE FROM suiviOperation WHERE idSuiviOperation = :idSuiviOperation";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idSuiviOperation' => $idSuiviOperation]);
    }

}
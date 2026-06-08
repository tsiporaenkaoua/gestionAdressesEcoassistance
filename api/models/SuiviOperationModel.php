<?php

class SuiviOperationModel{
    private $pdo;
 

    public function __construct($pdo){
        $this->pdo = $pdo;
    }   

    public function create(array $data){
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

    public function getAll(){
        $sql = "SELECT * FROM suiviOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByIds($idAdresse, $idOperation){
        $sql = "SELECT * FROM suiviOperation WHERE idAdresse = :idAdresse AND idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idAdresse' => $idAdresse,
                        ':idOperation' => $idOperation
                        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByAdresse($idAdresse){
        $sql = "SELECT * FROM suiviOperation WHERE idAdresse = :idAdresse";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idAdresse' => $idAdresse]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByOperation($idOperation){
        $sql = "SELECT * FROM suiviOperation WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idOperation' => $idOperation]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($idAdresse, $idOperation, array $data){
        $sql = "UPDATE suiviOperation SET  statut = :statut, dateIntervention = :dateIntervention, dateFinIntervention = :dateFinIntervention WHERE idAdresse = :idAdresse AND idOperation = :idOperation  ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':statut' => $data['statut'],
            ':dateIntervention' => $data['dateIntervention'],
            ':dateFinIntervention' => $data['dateFinIntervention'],
            ':idAdresse' => $idAdresse,
            ':idOperation' => $idOperation
        ]);
    }

    public function deleteSuiviOperation($idAdresse, $idOperation){
        $sql = "DELETE FROM suiviOperation WHERE idAdresse = :idAdresse AND idOperation = :idOperation ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idAdresse' => $idAdresse,
                        ':idOperation' => $idOperation
                        ]);
    }

    public function existsAdresseOperation($idAdresse, $idOperation){
        $sql = "SELECT COUNT(*) as count FROM suiviOperation WHERE idAdresse = :idAdresse AND idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':idAdresse' => $idAdresse,
            ':idOperation' => $idOperation
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

}
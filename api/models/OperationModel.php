<?php
class OperationModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createOperation(array $data){
        $sql = "INSERT INTO operation (nom) VALUES (:nom) ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':nom'=> $data['nom'] ]);
    }

    public function getAllOperations(){
        $sql = "SELECT * FROM operation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOperation($idOperation){
        $sql = "SELECT* FROM operation WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idOperation'=>$idOperation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateOperation(array $data){
        $sql = "UPDATE operation SET nom = :nom WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idOperation'=>$data['idOperation'],
            ':nom' => $data['nom']]);
    }

    public function deleteOperation($idOperation){
        $sql = "DELETE FROM operation WHERE idOperation = :idOperation";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([':idOperation'=>$idOperation]);
    }

}
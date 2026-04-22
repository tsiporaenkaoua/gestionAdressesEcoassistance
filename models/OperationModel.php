<?php
class OperationModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createOperation(Operation $operation){
        $sql = "INSERT INTO operation (nom) VALUES (:nom) ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':nom'=> $operation->getNom()]);
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

    public function updateOperation(Operation $operation){
        $sql = "UPDATE operation SET nom = :nom WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idOperation'=>$operation->getIdOperation(),
            ':nom' => $operation->getNom()]);
    }

    public function deleteOperation($idOperation){
        $sql = "DELETE FROM operation WHERE idOperation = :idOperation";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([':idOperation'=>$idOperation]);
    }

}
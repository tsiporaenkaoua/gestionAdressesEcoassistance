<?php
class OperationModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function create(array $data){
        $sql = "INSERT INTO operation (nom) VALUES (:nom) ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':nom'=> $data['nom'] ]);
    }

    public function getAll(){
        $sql = "SELECT * FROM operation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByOperation($idOperation){
        $sql = "SELECT* FROM operation WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idOperation'=>$idOperation]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, array $data){
        $sql = "UPDATE operation SET nom = :nom WHERE idOperation = :idOperation";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idOperation'=>$id,   
            ':nom' => $data['nom']]);
    }

    public function delete($idOperation){
        $sql = "DELETE FROM operation WHERE idOperation = :idOperation";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([':idOperation'=>$idOperation]);
    }

    

}
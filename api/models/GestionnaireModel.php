<?php
class GestionnaireModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    // S P E
    public function create(array $data){
        $sql = "INSERT INTO gestionnaire(nom, prenom, actif) VALUES (:nom, :prenom, :actif)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom'=> $data['prenom'], 
            ':actif' => $data['actif']
        ]);
    }

    // S Q F
    public function getAll(){
        $sql = "SELECT * FROM gestionnaire";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // S P E F 
    public function getById($idGestionnaire){
        $sql = "SELECT * FROM gestionnaire WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ ':idGestionnaire' => $idGestionnaire]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //S P E
    public function update($id, array $data){
        $sql = "UPDATE gestionnaire 
        SET  nom =:nom, prenom = :prenom, actif =:actif
        WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
             ':nom' => $data['nom'],
            ':prenom'=> $data['prenom'], 
            ':actif' => $data['actif'],
            ':idGestionnaire' => $id        
        ]);
    }

    // S P E
    public function delete($idGestionnaire){
        $sql = "DELETE FROM gestionnaire WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        return  $stmt->execute([ ':idGestionnaire' => $idGestionnaire]);
    }
    
}


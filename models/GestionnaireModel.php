<?php
class GestionnaireModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    // S P E
    public function createGestionnaire(Gestionnaire $gestionnaire){
        $sql = "INSERT INTO gestionnaire(nom, prenom, actif) VALUES (:nom, :prenom, :actif)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $gestionnaire->getNom(),
            ':prenom'=> $gestionnaire->getPrenom(), 
            ':actif' => $gestionnaire->isActif()
        ]);
    }

    // S Q F
    public function getAllGestionnaires(){
        $sql = "SELECT * FROM gestionnaire";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // S P E F 
    public function getGestionnaire($idGestionnaire){
        $sql = "SELECT * FROM gestionnaire WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ ':idestionnaire' => $idGestionnaire]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //S P E
    public function updateGestionnaire(Gestionnaire $gestionnaire){
        $sql = "UPDATE FROM gestionnaire 
        SET  nom =':nom', prenom = ':prenom', actif =':actif'";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
             ':nom' => $gestionnaire->getNom(),
            ':prenom'=> $gestionnaire->getPrenom(), 
            ':actif' => $gestionnaire->isActif()
        ]);
    }

    // S P E
    public function deleteGestionnaire($idGestionnaire){
        $sql = "DELETE FROM gestionnaire WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        return  $stmt->execute([ ':idestionnaire' => $idGestionnaire]);
    }
    
}

// transformer  les retours (getAll et get) en objet
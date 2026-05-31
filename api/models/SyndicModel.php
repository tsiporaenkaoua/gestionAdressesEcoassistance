<?php
class SyndicModel{
    
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createSyndic(array $data){
        $sql = "INSERT INTO syndic (raisonSociale,siret,adresse,codePostal,ville,actif)
        VALUES (:raisonSociale,:siret,:adresse,:codePostal,:ville,:actif)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':raisonSociale' => $data['raisonSociale'],
            ':siret' => $data['siret'],
            ':adresse' => $data['adresse'],
            ':codePostal' => $data['codePostal'],
            ':ville' => $data['ville'],
            ':actif' => $data['actif']
        ]);
    }

    public function getAllSyndic(){
        $sql = "SELECT * FROM  syndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSyndic($idSyndic){
        $sql = "SELECT * FROM syndic WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idSyndic' => $idSyndic]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    public function updateSyndic(array $data){
        $sql = "UPDATE syndic
        SET raisonSociale = :raisonSociale, siret = :siret, adresse = :adresse, codePostal = :codePostal, ville = :ville, actif = :actif
        WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':raisonSociale' => $data['raisonSociale'],
            ':siret' => $data['siret'],
            ':adresse' => $data['adresse'],
            ':codePostal' => $data['codePostal'],
            ':ville' => $data['ville'],
            ':actif' => $data['actif'],
            ':idSyndic' => $data['idSyndic']
        ]);
    }

    public function deleteSyndic($idSyndic){
        $sql = "DELETE FROM syndic WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idSyndic' => $idSyndic]); 
    } 
}
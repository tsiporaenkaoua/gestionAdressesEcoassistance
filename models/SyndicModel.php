<?php
class SyndicModel{
    
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createSyndic(Syndic $syndic){
        $sql = "INSERT INTO syndic (raisonSociale,siret,adresse,codePostal,ville,actif)
        VALUES (:raisonSociale,:siret,:adresse,:codePostal,:ville,:actif)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':raisonSociale' => $syndic->getRaisonSociale(),
            ':siret' => $syndic->getSiret(),
            ':adresse' => $syndic->getAdresse(),
            ':codePostal' => $syndic->getCodePostal(),
            ':ville' => $syndic->getVille(),
            ':actif' => $syndic->isActif()
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

    public function updateSyndic(Syndic $syndic){
        $sql = "UPDATE syndic
        SET raisonSociale = :raisonSociale, siret = :siret, adresse = :adresse, codePostal = :codePostal, ville = :ville, actif = :actif
        WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':raisonSociale' => $syndic->getRaisonSociale(),
            ':siret' => $syndic->getSiret(),
            ':adresse' => $syndic->getAdresse(),
            ':codePostal' => $syndic->getCodePostal(),
            ':ville' => $syndic->getVille(),
            ':actif' => $syndic->isActif(),
            ':idSyndic' => $syndic->getIdSyndic()
        ]);
    }

    public function deleteSyndic($idSyndic){
        $sql = "DELETE FROM syndic WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idSyndic' => $idSyndic]); 
    } 
}
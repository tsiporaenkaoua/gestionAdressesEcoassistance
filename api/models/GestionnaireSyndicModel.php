<?php
class GestionnaireSyndicModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function create(array $data){
        $sql = "INSERT INTO gestionnairesyndic(idGestionnaire,idSyndic,mail,tel)
        VALUES (:idGestionnaire,:idSyndic,:mail,:tel)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idGestionnaire' => $data['idGestionnaire'],
            ':idSyndic' => $data['idSyndic'],
            ':mail' => $data['mail'],
            ':tel' => $data['tel']
        ]);
    }

    public function getAllGestionnaireSyndic(){
        $sql = "SELECT * FROM gestionnairesyndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGestionnaireSyndic($idGestionnaire, $idSyndic){
        $sql = "SELECT * FROM gestionnairesyndic WHERE  idGestionnaire = :idGestionnaire AND idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':idGestionnaire' => $idGestionnaire,
            ':idSyndic' => $idSyndic
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGestionnaireSyndic(array $data){
        $sql = "UPDATE gestionnairesyndic SET mail = :mail, tel = :tel WHERE idGestionnaire = :idGestionnaire AND idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':mail' => $data['mail'],
            ':tel' => $data['tel'],
            ':idGestionnaire' => $data['idGestionnaire'],
            ':idSyndic' => $data['idSyndic']
        ]);

    }

    public function deleteGestionnaireSyndic($idGestionnaire, $idSyndic){
        $sql = "DELETE FROM gestionnairesyndic WHERE idGestionnaire = :idGestionnaire AND idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':idGestionnaire' => $idGestionnaire,
                ':idSyndic' => $idSyndic
            ]);
    }

    // Rechercher par gestionnaire seul
    public function getGestionnaireSyndicByGestionnaire($idGestionnaire){
        $sql = "SELECT * FROM gestionnairesyndic WHERE idGestionnaire = :idGestionnaire";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idGestionnaire' => $idGestionnaire]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Rechercher par syndic seul
    public function getGestionnaireSyndicBySyndic($idSyndic){
        $sql = "SELECT * FROM gestionnairesyndic WHERE idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idSyndic' => $idSyndic]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Vérifier si une association existe
    public function existsGestionnaireSyndic($idGestionnaire, $idSyndic){
        $sql = "SELECT COUNT(*) as count FROM gestionnairesyndic WHERE idGestionnaire = :idGestionnaire AND idSyndic = :idSyndic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':idGestionnaire' => $idGestionnaire,
            ':idSyndic' => $idSyndic
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
<?php

class AdresseModel{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }


    //CREATE S-P-E
    public function createAdresse(Adresse $adresse){
        $sql = "INSERT INTO adresse (adresse, codePostal, ville, idGestionnaire) 
                VALUES (:adresse,:codePostal,:ville,:idGestionnaire)";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':adresse' => $adresse->getAdresse(),
            ':codePostal' => $adresse->getCodePostal(),
            ':ville' => $adresse->getVille(),
            ':idGestionnaire' => $adresse->getIdGestionnaire()
        ]);
    } 

    //READ ALL S-Q-F
    public function getAllAdresses(){
        $sql = "SELECT * FROM adresse";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
 
    //READ ONE S-P-E-F
    public function getAdresseById($id){
        $sql = "SELECT * FROM adresse WHERE idAdresse = :idAdresse";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':idAdresse' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   
    //UPDATE S-P-E
    public function updateAdresse(Adresse $adresse){
        $sql= "UPDATE adresse
                SET adresse = :adresse,	codePostal = :codePostal, ville = :ville, idGestionnaire = :idGestionnaire
                WHERE idAdresse = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':adresse' => $adresse->getAdresse(),
            ':codePostal' => $adresse->getCodePostal(),
            ':ville' => $adresse->getVille(),
            ':idGestionnaire' => $adresse->getIdGestionnaire(),
            ':id' => $adresse->getIdAdresse()     
        ]);
    }
    //DELETE  S - P - E
    public function deleteAdresse( $id){
        $sql = "DELETE FROM adresse WHERE idAdresse = :idAdresse";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':idAdresse'=> $id]);


    }
}

/*retourner des objets partout
utiliser hydrate()
gérer les relations (Gestionnaire)
*/
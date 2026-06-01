<?php

class AdresseService {

    public function validate(array &$data){ //La fonction modifie la vraie variable et non une copie (ce qui se passe si on met pas &) Les changements sont visibles après l’appel

        // 1. Vérification des champs obligatoires
        $required = ['adresse', 'codePostal', 'ville', 'idGestionnaire'];

        foreach($required as $field){
            if(!isset($data[$field]) || trim($data[$field]) === ''){
                throw new Exception("Le champ '$field' est obligatoire");
            }
        }

        // 2. Nettoyage des données String
        $data['adresse'] = trim($data['adresse']);
        $data['ville'] = trim($data['ville']); 
        $data['codePostal'] = trim($data['codePostal']);

        // 3. Validation du code postal
        if(!preg_match('/^[0-9]{5}$/', $data['codePostal'])){
            throw new Exception("Le code postal doit contenir exactement 5 chiffres");
        }

        // 4. Validation idGestionnaire (doit être un entier positif)
        if(!ctype_digit((string)$data['idGestionnaire']) || $data['idGestionnaire'] <= 0){
            throw new Exception("idGestionnaire doit être un entier positif");
        }

        // Si tout est OK, on retourne true
        return true;
    }
}


<?php

class GestionnaireService {

    public function validate(array &$data){ // un array en PHP n’est PAS juste une liste, c’est une structure clé → valeur par défaut.


        // 1. Vérification des champs obligatoires 
        $required = ['nom', 'prenom', 'actif'];

        foreach($required as $field){
            if(!isset($data[$field]) ){
                throw new Exception("Le champ '$field' est obligatoire");
            }
        }

        // 2. Nettoyage des données String
        $data['nom'] = trim($data['nom']);
        $data['prenom'] = trim($data['prenom']); 

         // 3. Vérification que les champs String ne sont pas vides
         if ($data['nom'] === '' ||$data['prenom'] === ''){
            throw new Exception("Les champs 'nom' et 'prenom' ne peuvent pas être vides");
        }

        // 4. Validation du champs actif
        if(!is_bool($data['actif'])){
            throw new Exception("Le champs actif doit retourner un booleen");
        }


        // Si tout est OK, on retourne true
        return true;
    }
}


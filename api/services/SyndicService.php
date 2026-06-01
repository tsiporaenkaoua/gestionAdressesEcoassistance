<?php

class SyndicService{

    // 1. Vérification que les champs obligatoires existent
    public function validate(array &$data){ 
            
        $required = ['raisonSociale','siret','adresse','codePostal','ville','actif'];

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                throw new Exception("Le champ '$field' est obligatoire");
            }
        }

        
        //nettoyage des données String
        $data['raisonSociale'] = trim($data['raisonSociale']);
        $data['siret'] = trim($data['siret']);
        $data['adresse'] = trim($data['adresse']); 
        $data['ville'] = trim($data['ville']);
        $data['codePostal'] = trim($data['codePostal']);
        
        // verification que les données existantes ne sont pas vides
        if (
            $data['raisonSociale'] === '' ||
            $data['siret'] === '' ||
            $data['adresse'] === '' ||
            $data['codePostal'] === '' ||
            $data['ville'] === ''
            ) {
            throw new Exception("Les champs texte ne peuvent pas être vides");
        }


        //code postal regex, siret 14 chiffres, actif booleen
         if(!preg_match('/^[0-9]{5}$/', $data['codePostal'])){
            throw new Exception("Le code postal doit contenir exactement 5 chiffres");
        }
        if(!preg_match('/^[0-9]{14}$/', $data['siret'])){
            throw new Exception("Le siret doit contenir exactement 14 chiffres");
        }

        if(!is_bool($data['actif'])){
            throw new Exception("Le champs actif doit retourner un booleen");
        }

    }

}
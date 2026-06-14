    <?php

    class GestionnaireSyndicService {

        // Vérification des champs obligatoires
        public function validate(array &$data) {

            $required = ['mail', 'tel'];
    
            foreach ($required as $field) {
                if (!isset($data[$field])) {
                    throw new Exception("Le champ '$field' est obligatoire");
                }
            }

            // Nettoyage des strings
            $data['mail'] = trim($data['mail']);
            $data['tel'] = trim($data['tel']);

            // Vérification que les champs ne sont pas vides
            if ($data['mail'] === '' || $data['tel'] === '') {
                throw new Exception("Les champs mail et tel ne peuvent pas être vides");
            }

            // Vérification email
            if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Le mail n'est pas valide");
            }

            // Vérification téléphone (10 chiffres FR)
            if (!preg_match('/^[0-9]{10}$/', $data['tel'])) {
                throw new Exception("Le numéro de téléphone doit contenir 10 chiffres");
            }
        }

        public function checkDuplicate( $model,array $data){
            if ($model->existsGestionnaireSyndic($data['idGestionnaire'], $data['idSyndic'])) {
                throw new Exception("Ce gestionnaire est déjà associé à ce syndic");
        }
}
    }
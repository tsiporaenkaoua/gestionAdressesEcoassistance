Création d'une API qui s'occupe de la gestion des sites par les gestionnaires et syndics

UNE TABLE D ASSOCIATION DOIT PRENDRE EN COMPTE DES CHOSES PARTICULIERES

✅ Pas de setters pour les clés → une fois créée, la relation est immuable (pareil pour toutes les classes normales)
✅ Validations → vérifier que les deux clés existent dans leurs tables respectives
✅ Requêtes supplémentaires → rechercher par gestionnaire seul, ou par syndic seul
✅ Delete/Update → nécessitent toujours les DEUX clés

 
TESTS

1. baseController : controller generique
Un contrôleur générique qui gère :
- GET all
- GET one
- POST
- PUT
- DELETE

2. controller pour chaque classe : 
il indique : 
- quel modèle utiliser 
- quel service utiliser

3. Service pour chaque classe :
 Il contient la logique métier :
- validations
- règles
- transformations

4. routeur dans l'index
il route vers le bon controller


 LES TESTS : adresses/gest/
-tests curl en commande pour les endpoint de adresses
- pr le reste hoopscotch (similaire a postman qui etait galere ne voulait pas s'activer)
- remplissage de la base de donnée avec faker pour pouvoir tester tranquillement mes endpoints


(adresse, gest, syndic, gestSyndic ok)
Service 
Controller
TESTS

CONTINUER AUTRES CONTROLLEURS


 





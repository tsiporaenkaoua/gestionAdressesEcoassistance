
---

# 4️⃣ Exemple d'utilisation

Créer une adresse :

```php
$adresse = new Adresse(
    "12 rue Victor Hugo",
    "Paris",
    "75015",
    2
);

$model = new AdresseModel($pdo);
$model->create($adresse);
```

---

# 5️⃣ Dans ton site ça donnera des pages

```
/adresse
    liste_adresses.php
    ajouter_adresse.php
    modifier_adresse.php
```

Fonctions :

| Action                   | Page   |
| ------------------------ | ------ |
| voir toutes les adresses | liste  |
| ajouter                  | create |
| modifier                 | update |
| supprimer                | delete |

---

# 6️⃣ Dans ton backlog ça devient

Fonctionnalités :

* CRUD Adresse
* CRUD Syndic
* CRUD Gestionnaire
* CRUD Operation
* CRUD SuiviOperation

---

💡 Si tu veux, je peux aussi te montrer **le CRUD complet typique que les profs attendent (Controller + Model + Views)** parce que **90% des étudiants le font mal en MVC**.

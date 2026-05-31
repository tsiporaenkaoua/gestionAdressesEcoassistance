<?php
use PHPUnit\Framework\TestCase;

// Charger vos classes
require_once __DIR__ . '/../models/Adresse.php';

class AdresseTest extends TestCase {
    
    // Votre premier test !
    public function testAdressePeutEtreCree() {
        $adresse = new Adresse(1, "123 Rue Test", "75001", "Paris", 5);
        
        // Vérifier que l'objet est créé
        $this->assertInstanceOf(Adresse::class, $adresse);
    }
}

// IL FAUT CREER LES CONTROLLER ET ENSUITE ON POURRA FAIRE TOURNER NOS TESTS
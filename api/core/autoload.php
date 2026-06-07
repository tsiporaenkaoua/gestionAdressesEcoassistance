<?php

// 1. Charger Composer (Faker, libs externes, etc.)
require_once __DIR__ . '/../../vendor/autoload.php';

// 2. Ton autoload à toi (MVC)
spl_autoload_register(function($class){

    $paths = [
        __DIR__ . "/../controllers/",
        __DIR__ . "/../models/",
        __DIR__ . "/../core/",
        __DIR__ . "/../services/"
    ];

    foreach($paths as $path){
        $file = $path . $class . ".php";

        if(file_exists($file)){
            require $file;
            return;
        }
    }
});
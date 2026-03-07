<?php
spl_autoload_register(function($class){
    $paths = [
        "controllers/",
        "models/",
        "core/"
    ];

    foreach($paths as $path){
        $file = $path.$class.".php";

        if(file_exists($file)){
            require $file;
        }
    }
});
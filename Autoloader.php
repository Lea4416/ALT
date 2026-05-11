<?php

namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
            ]);
    }

    static function autoload($class){
        // echo $class . "<br>";

        // On récupére dans classe la totalité du names space de la classe App\Banque\CompteEpargneCourant

        // On retire App\ donc ca fait Banque\CompteEpargneCourant
        // echo __NAMESPACE__;

        $class = str_replace(__NAMESPACE__. '\\','',$class);

        // On remplace les \ par des /
        $class = str_replace( '\\','/',$class);


        // echo $class . "<br>";

        // echo __DIR__ . '/' . $class . '.php <br>';

        // On verifie si le fichier existe
        $fichier = __DIR__ . '/' . $class . '.php';
        if(file_exists($fichier)){
        require_once __DIR__ . '/' . $class . '.php';
        }else{
            echo '<script>console.log("Le fichier n\'existe pas.");</script>';
        };

    }
}
<?php

use Project\Core\Routing;
require 'conf.inc.php';

/**
 * @param string $class
 */
function myAutoloader(string $class)
{
    $test = str_replace("Project\\","",$class);
    $test2=str_replace("\\","/",$test);
    $test3=lcfirst($test2);
    $classPath = $test3.'.class.php';
    $classModel = $test3.'.class.php';
    if (file_exists($classPath)) {
        include $classPath;
    } elseif (file_exists($classModel)) {
        include $classModel;
    }
}

// La fonction myAutoloader est lancé sur la classe appelée n'est pas trouvée
spl_autoload_register('myAutoloader');

// Récupération des paramètres dans l'url - Routing
$slug = explode('?', $_SERVER['REQUEST_URI'])[0];
$routes = Routing::getRoute($slug);
extract($routes);

$container = require  'config/di.global.php';
$container['config'] = require 'config/global.php';

// Vérifie l'existence du fichier et de la classe pour charger le controlleur
if (file_exists($cPath)) {
    include $cPath;
    if (class_exists('\\Project\\Controller\\'.$c)) {
        //instancier dynamiquement le controller
        //$cObject = new $c();
        $cObject = $container['Project\Controller\\'.$c]($container);
        //vérifier que la méthode (l'action) existe
        if (method_exists($cObject, $a)) {
            //appel dynamique de la méthode
            $cObject->$a();
        } else {
            die('La methode '.$a." n'existe pas");
        }
    } else {
        die('La class controller '.$c." n'existe pas");
    }
} else {
    die('Le fichier controller '.$c." n'existe pas");
}

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'app/routes.php';

require __DIR__.'/src/Database.php';
require __DIR__.'/src/Controller/AbstractController.php';
require __DIR__.'/src/Controller/DefaultController.php';

require __DIR__.'/src/Entity/Film.php';
require __DIR__.'/src/Entity/Personne.php';
require __DIR__.'/src/Models/FilmModel.php';
require __DIR__.'/src/Models/PersonneModel.php';

$action = $_GET['action'] ?? 'home';

if(array_key_exists($action, $aRoutes)){
    list($sControllerName, $sActionName) = explode('::', $aRoutes[$action]);

    // Appeler l'aciton sur le controller : analyser la chaine de caractères 
    echo (new $sControllerName())->$sActionName(); 
} else {
    $action = 'ERREUR 404 : PAGE INTROUVABLE'; // par défaut on va sur la page d'acceuil
};
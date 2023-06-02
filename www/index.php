<?php

namespace App;

//require "Core/View.php";

spl_autoload_register(function ($class) {

    //$class = App\Core\View
    $class = str_replace("App\\","", $class);
    //$class = Core\View
    $class = str_replace("\\","/", $class);
    //$class = Core/View
    $classForm = $class.".form.php";
    $class = $class.".php";
    //$class = Core/View.php
    if(file_exists($class)){
        include $class;
    }else if(file_exists($classForm)){
        include $classForm;
    }
});

/*
Level Authentificatioin
    - 0 : Utilisateur anonyme
    - 1 : Utilisateur Lambda
    - 2 : Utilisateur Annonceur
    - 3 : Utilisateur Admin 

*/

// Recuperation info de connection
if(isset($_SESSION['zfgh_login'])){
    if($_SESSION['zfgh_login']['connected']){
        $level_auth_user = $_SESSION['zfgh_login']['status'];
    }
    else{
        $level_auth_user = 0;    
    }
}
else{
    $level_auth_user = 0;   
}




//Afficher le controller et l'action correspondant à l'URI

$uri = $_SERVER["REQUEST_URI"];
$uriExploded = explode("?", $uri);
$uri = strtolower(trim( $uriExploded[0], "/"));

if(empty($uri)){
    $uri = "default";
}

if(!file_exists("routes.yml")){
    die("Le fichier routes.yml n'existe pas");
}

$routes = yaml_parse_file("routes.yml");

if(empty($routes[$uri])){
    die("Page 404");
    // Route pour les annonce dynamique a mettre ici
}

if(empty($routes[$uri]["controller"]) || empty($routes[$uri]["action"]) ){
    die("Cette route ne possède pas de controller ou d'action dans le fichier de routing");
}

$controller = $routes[$uri]["controller"];
$action = $routes[$uri]["action"];
$level_auth = $routes[$uri]["level_auth"];



// Si le niveau d'auth de l'utilisateur est plus petit que celui de la route,
// on le redirige vers l'accueil avec une pop up erreur
if($level_auth_user < $level_auth){
    header('location: /?conn=false');
    exit;
}

// $controller => Auth ou Main
// $action=> home ou login


if(!file_exists("Controllers/".$controller.".php")){
    die("Le fichier Controllers/".$controller.".php n'existe pas");
}
include "Controllers/".$controller.".php";

$controller = "\\App\\Controllers\\".$controller;

if(!class_exists($controller)){
    die("La classe ".$controller." n'existe pas");
}
$objController = new $controller();

if(!method_exists($objController, $action)){
    die("L'action ".$action." n'existe pas");
}

$objController->$action();

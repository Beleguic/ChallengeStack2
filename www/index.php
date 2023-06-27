<?php

    namespace App;

    use App\Controllers\SiteController;
    use App\Controllers\Main;
    use App\Controllers\Auth;
    use App\Controllers\Annonce;
    use App\Controllers\Type;
    use App\Core\Application;

    //require "Core/View.php";

    spl_autoload_register(function ($class) {

        //$class = App\Core\View
        $class = str_replace("App\\", "", $class);
        //$class = Core\View
        $class = str_replace("\\", "/", $class);
        //$class = Core/View
        $classForm = $class . ".form.php";
        $class = $class . ".php";
        //$class = Core/View.php
        if (file_exists($class)) {
            include $class;
        } else if (file_exists($classForm)) {
            include $classForm;
        }
    });

/*


Level Authentificatioin
    - 0 : Utilisateur anonyme
    - 1 : Utilisateur Lambda
    - 2 : Utilisateur Annonceur
    - 3 : Utilisateur Admin 



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

*/

    $app = new Application();



    $app->router->get('/', [Main::class ,"home"]);

    
    // Navbar
    $app->router->get('/contact', [Main::class ,"contact"]);
    $app->router->post('/contact', [Main::class ,"contact"]);
    $app->router->get('/about-us', [Main::class ,"aboutUs"]);
    $app->router->post('/about-us', [Main::class ,"aboutUs"]);

    $app->router->get('/a-propos', [Main::class ,"aboutUs"]);
    $app->router->post('/a-propos', [Main::class ,"aboutUs"]);

     //Login
     $app->router->get('/login', [Auth::class ,"login"]);
     $app->router->post('/login', [Auth::class ,"login"]);
     $app->router->get('/register', [Auth::class ,"register"]);
     $app->router->post('/register', [Auth::class ,"register"]);

     $app->router->get('/se-connecter', [Auth::class ,"login"]);
     $app->router->post('/se-connecter', [Auth::class ,"login"]);
     $app->router->get('/s-inscrire', [Auth::class ,"register"]);
     $app->router->post('/s-inscrire', [Auth::class ,"register"]);

     $app->router->post('/annonce/{annonceTitle}', [Annonce::class ,"getOneAnnonce"]);
     $app->router->get('/annonce/{annonceTitle}', [Annonce::class ,"getOneAnnonce"]);

 
    // Route annonce back
    $app->router->get('/back/annonce', [Annonce::class ,"viewAnnonce"]);

    $app->router->get('/back/add-annonce', [Annonce::class ,"addAnnonce"]);
    $app->router->get('/back/update-annonce', [Annonce::class ,"updateAnnonce"]);
    $app->router->get('/back/delete-annonce', [Annonce::class ,"deleteAnnonce"]);

    $app->router->post('/back/add-annonce', [Annonce::class ,"addAnnonce"]);
    $app->router->post('/back/update-annonce', [Annonce::class ,"updateAnnonce"]);
    $app->router->post('/back/delete-annonce', [Annonce::class ,"deleteAnnonce"]);


    //Route type back
    $app->router->get('/back/type', [Type::class ,"viewType"]);

    $app->router->get('/back/add-type', [Type::class ,"addType"]);
    $app->router->get('/back/update-type', [Type::class ,"updateType"]);
    $app->router->get('/back/delete-type', [Type::class ,"deleteType"]);
    $app->router->post('/back/add-type', [Type::class ,"addType"]);
    $app->router->post('/back/update-type', [Type::class ,"updateType"]);
    $app->router->post('/back/delete-type', [Type::class ,"deleteType"]);


   
    

    /*$app->router->get('/contact',[SiteController::class ,"contact"]);
    $app->router->get('/contact/{id}/test/{test}', [SiteController::class ,"contact"]);

    $app->router->post('/contact',[SiteController::class ,'handleContact']);*/
    


    $app->run();



?>
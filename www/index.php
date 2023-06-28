<?php

    namespace App;

    use App\Controllers\SiteController;
    use App\Controllers\Main;
    use App\Controllers\Auth;
    use App\Controllers\Annonce;
    use App\Controllers\Type;
    use App\Core\Application;

    date_default_timezone_set("Europe/Paris");

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
    if(isset($_SESSION['zfgh_login']['actif']) && !$_SESSION['zfgh_login']['actif']){
        $uri = strtolower(trim(explode("?", $_SERVER["REQUEST_URI"])[0], "/"));
        if($uri != "activation"){
            header("location: /activation");
        }
    }
    else{
        $uri = strtolower(trim(explode("?", $_SERVER["REQUEST_URI"])[0], "/"));
        if($uri == "activation"){
            header("location: /");
        }
    }

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
    $app->router->get('/logout', [Auth::class ,"logout"]);
    $app->router->post('/logout', [Auth::class ,"logout"]);

    $app->router->get('/back/user', [Auth::class ,"listUser"]);
    $app->router->post('/back/user', [Auth::class ,"listUser"]);
    $app->router->get('/back/update-user', [Auth::class ,"updateUser"]);
    $app->router->post('/back/update-user', [Auth::class ,"updateUser"]);
    $app->router->get('/back/delete-user', [Auth::class ,"deleteUser"]);
    $app->router->post('/back/delete-user', [Auth::class ,"deleteUser"]);

    $app->router->get('/activation', [Auth::class ,"activateAccount"]);
    $app->router->post('/activation', [Auth::class ,"activateAccount"]);

    $app->router->get('/se-connecter', [Auth::class ,"login"]);
    $app->router->post('/se-connecter', [Auth::class ,"login"]);
    $app->router->get('/s-inscrire', [Auth::class ,"register"]);
    $app->router->post('/s-inscrire', [Auth::class ,"register"]);

    $app->router->get('/reset-pwd', [Auth::class ,"resetPwd"]);
    $app->router->post('/reset-pwd', [Auth::class ,"resetPwd"]);

    $app->router->get('/deconnexion', [Auth::class ,"logout"]);
    $app->router->post('/deconnexion', [Auth::class ,"logout"]);


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
<?php

    namespace App;

    use App\Controllers\SiteController;
    use App\Controllers\Main;
    use App\Controllers\Auth;
    use App\Controllers\Annonce;
    use App\Controllers\Type;
    use App\Models\Connexion;
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
    if(isset($_SESSION['zfgh_login'])){
        if(isset($_SESSION['zfgh_login']['token'])){
            $token = $_SESSION['zfgh_login']['token'];
            $id = $_SESSION['zfgh_login']['id'];
            $connexion = new Connexion();
            $connexion = $connexion->populateWith(["id_user" => $id]);
            if(isset($connexion->property)){ 
                unset($_SESSION['zfgh_login']);
            }
            else{
                $last_seen = date('Y-m-d H:i:s.u', strtotime($connexion->getLastSeen()));
                $heure_supplementaire = strtotime('+2 hour', strtotime($last_seen));
                $last_seenPlus2Hour = date('Y-m-d H:i:s', $heure_supplementaire);
                $dateNow = date('Y-m-d H:i:s.u');
                if ($dateNow > $last_seenPlus2Hour)
                {
                   $connexion->save('del');
                   unset($_SESSION['zfgh_login']);
                }
                else{
                    if($token == $connexion->getToken()){
                        $newToken = sha1(uniqid());
                        $_SESSION['zfgh_login']['token'] = $newToken;
                        $connexion->setToken($newToken);
                        $connexion->setLastSeen(date('Y-m-d H:i:s'));
                        $connexion->save();
                    }
                    else{
                        $connexion->save('del');
                        unset($_SESSION['zfgh_login']); 
                    }
                }
            }

        }
        else{
            unset($_SESSION['zfgh_login']);
        }
    }
    else{
        unset($_SESSION['zfgh_login']);
    }

/*

token de connexion
Creation d'une nouvelle table 'Connexion'
id, mail et token de co
a chaque F5, on verifie si le token dans le $_SESSION est le meme que la BDD
Si il est pareil, on maintien la connexion et on change le token dans la BDD et dans le $_SESSION pour le prochain F5
Si il n'est pas pareil, on deconnecte l'utilisateur
Création d'un token dans la BDD au moment de la connexion a l'appli
Si l'utilisateur fait f5 au bout de 2h apres le dernier, il est deconnecter et doit ce reconnecter pour generer un nouveau token
Connexion : Insert
F5 : update
F5 + 2h : Delete
Desconnexion : Delete


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

    // Route de base
    $app->router->get('/', [Main::class ,"home"]);
    $app->router->get('/back', [Main::class ,"dashboard"]);

    // Navbar front
    $app->router->get('/contact', [Main::class ,"contact"]);
    $app->router->post('/contact', [Main::class ,"contact"]);
    $app->router->get('/about-us', [Main::class ,"aboutUs"]);
    $app->router->post('/about-us', [Main::class ,"aboutUs"]);

    $app->router->get('/a-propos', [Main::class ,"aboutUs"]);
    $app->router->post('/a-propos', [Main::class ,"aboutUs"]);

    // Route Login/Register front
    $app->router->get('/login', [Auth::class ,"login"]);
    $app->router->get('/se-connecter', [Auth::class ,"login"]);
    $app->router->get('/register', [Auth::class ,"register"]);
    $app->router->get('/s-inscrire', [Auth::class ,"register"]);
    $app->router->get('/logout', [Auth::class ,"logout"]);
    $app->router->get('/deconnexion', [Auth::class ,"logout"]);
    
    $app->router->post('/login', [Auth::class ,"login"]);
    $app->router->post('/se-connecter', [Auth::class ,"login"]);
    $app->router->post('/register', [Auth::class ,"register"]);
    $app->router->post('/s-inscrire', [Auth::class ,"register"]);
    $app->router->post('/logout', [Auth::class ,"logout"]);
    $app->router->post('/deconnexion', [Auth::class ,"logout"]);
    
    $app->router->get('/activation', [Auth::class ,"activateAccount"]);
    $app->router->get('/reset-pwd', [Auth::class ,"resetPwd"]);
    $app->router->get('/reset-pwd-mail', [Auth::class ,"resetPwdMail"]);
    
    $app->router->post('/activation', [Auth::class ,"activateAccount"]);
    $app->router->post('/reset-pwd', [Auth::class ,"resetPwd"]);
    $app->router->post('/reset-pwd-mail', [Auth::class ,"resetPwdMail"]);
    
    // Route annonce front
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
    
    // Route type back
    $app->router->get('/back/type', [Type::class ,"viewType"]);
    
    $app->router->get('/back/add-type', [Type::class ,"addType"]);
    $app->router->get('/back/update-type', [Type::class ,"updateType"]);
    $app->router->get('/back/delete-type', [Type::class ,"deleteType"]);
    $app->router->post('/back/add-type', [Type::class ,"addType"]);
    $app->router->post('/back/update-type', [Type::class ,"updateType"]);
    $app->router->post('/back/delete-type', [Type::class ,"deleteType"]);
    
    // Route user back
    $app->router->get('/back/user', [Auth::class ,"listUser"]);
    $app->router->post('/back/user', [Auth::class ,"listUser"]);
    $app->router->get('/back/update-user', [Auth::class ,"updateUser"]);
    $app->router->post('/back/update-user', [Auth::class ,"updateUser"]);
    $app->router->get('/back/delete-user', [Auth::class ,"deleteUser"]);
    $app->router->post('/back/delete-user', [Auth::class ,"deleteUser"]);

    /*$app->router->get('/contact',[SiteController::class ,"contact"]);
    $app->router->get('/contact/{id}/test/{test}', [SiteController::class ,"contact"]);

    $app->router->post('/contact',[SiteController::class ,'handleContact']);*/
    


    $app->run();



?>

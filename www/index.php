<?php

    namespace App;

    use App\Controllers\SiteController;
    use App\Controllers\Main;
    use App\Controllers\InstallerController;
    use App\Controllers\SiteMapController;
    use App\Controllers\Auth;
    use App\Controllers\Annonce;
    use App\Controllers\Type;
    use App\Core\Middleware\AuthMiddleware;
    use App\Controllers\Setting;
    use App\Models\Connexion;
    use App\Core\Application;
    use App\Controllers\Newsletter;
    use App\Controllers\Back;
    use App\Controllers\Opinion;
    use App\Controllers\Agent;
    

    
    
    date_default_timezone_set("Europe/Paris");

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


 if (!file_exists('app.ini')) {
        header('Location: /public/react/src/index.php');
    }else{
        $ini = parse_ini_file('./app.ini');
    $globals = $GLOBALS;
    $GLOBALS['prefixe'] = $ini['prefixe'];
    $GLOBALS['siteName'] = $ini['siteName'];
    
    if(isset($_SESSION[''.$GLOBALS['prefixe'].'_login'])){
        if(isset($_SESSION[''.$GLOBALS['prefixe'].'_login']['token'])){
            $token = $_SESSION[''.$GLOBALS['prefixe'].'_login']['token'];
            $id = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];
            $connexion = new Connexion();
            $connexion = $connexion->populateWith(["id_user" => $id]);
            if(isset($connexion->property)){ 
                unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);
            }
            else{
                $last_seen = date('Y-m-d H:i:s.u', strtotime($connexion->getLastSeen()));
                $heure_supplementaire = strtotime('+2 hour', strtotime($last_seen));
                $last_seenPlus2Hour = date('Y-m-d H:i:s', $heure_supplementaire);
                $dateNow = date('Y-m-d H:i:s.u');
                if ($dateNow > $last_seenPlus2Hour)
                {
                   $connexion->save('del');
                   unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);
                }
                else{
                    if($token == $connexion->getToken()){
                        $newToken = sha1(uniqid());
                        $_SESSION[''.$GLOBALS['prefixe'].'_login']['token'] = $newToken;
                        $connexion->setToken($newToken);
                        $connexion->setLastSeen(date('Y-m-d H:i:s'));
                        $connexion->save();
                    }
                    else{
                        $connexion->save('del');
                        unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);; 
                    }
                }
            }

        }
        else{
            unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);
        }
    }
    else{
        unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);
    }
    
    if(isset($_SESSION[''.$GLOBALS['prefixe'].'_login']['actif']) && !$_SESSION[''.$GLOBALS['prefixe'].'_login']['actif']){
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
if(isset($_SESSION[''.$GLOBALS['prefixe'].'_login'])){
    if($_SESSION[''.$GLOBALS['prefixe'].'_login']['connected']){
        $level_auth_user = $_SESSION[''.$GLOBALS['prefixe'].'_login']['status'];
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
    //sitemap
    $app->router->get('/sitemap',[SiteMapController::class,'getSitemap'],[AuthMiddleware::class],0);
    //api route
    
         $app->router->post('/api/installer', [InstallerController::class ,"getInstaller"],[AuthMiddleware::class],0);
        $app->router->get('/api/installer', [InstallerController::class ,"getInstaller"],[AuthMiddleware::class],0);
        $app->router->post('/api/createUser', [InstallerController::class ,"createUser"],[AuthMiddleware::class],0);
        $app->router->get('/api/createUser', [InstallerController::class ,"createUSer"],[AuthMiddleware::class],0);
        $app->router->post('/api/verifyUser', [InstallerController::class ,"verifyUser"],[AuthMiddleware::class],0);
        $app->router->get('/api/verifyUser', [InstallerController::class ,"verifyUser"],[AuthMiddleware::class],0);
    
   
    // Route de base
    $app->router->get('/', [Main::class ,"home"],[AuthMiddleware::class],0);
    $app->router->get('/back', [Main::class ,"dashboard"],[AuthMiddleware::class],2);

    // Navbar front
    $app->router->get('/contact', [Main::class ,"contact"],[AuthMiddleware::class],0);
    $app->router->post('/contact', [Main::class ,"contact"],[AuthMiddleware::class],0);
    $app->router->get('/about-us', [Main::class ,"aboutUs"],[AuthMiddleware::class],0);
    $app->router->post('/about-us', [Main::class ,"aboutUs"],[AuthMiddleware::class],0);

    $app->router->get('/a-propos', [Main::class ,"aboutUs"],[AuthMiddleware::class],0);
    $app->router->post('/a-propos', [Main::class ,"aboutUs"],[AuthMiddleware::class],0);

    // Route Login/Register front
    $app->router->get('/login', [Auth::class ,"login"],[AuthMiddleware::class],0);
    $app->router->get('/se-connecter', [Auth::class ,"login"],[AuthMiddleware::class],0);
    $app->router->get('/register', [Auth::class ,"register"],[AuthMiddleware::class],0);
    $app->router->get('/s-inscrire', [Auth::class ,"register"],[AuthMiddleware::class],0);
    $app->router->get('/logout', [Auth::class ,"logout"],[AuthMiddleware::class],0);
    $app->router->get('/deconnexion', [Auth::class ,"logout"],[AuthMiddleware::class],0);
    
    $app->router->post('/login', [Auth::class ,"login"],[AuthMiddleware::class],0);
    $app->router->post('/se-connecter', [Auth::class ,"login"],[AuthMiddleware::class],0);
    $app->router->post('/register', [Auth::class ,"register"],[AuthMiddleware::class],0);
    $app->router->post('/s-inscrire', [Auth::class ,"register"],[AuthMiddleware::class],0);
    $app->router->post('/logout', [Auth::class ,"logout"],[AuthMiddleware::class],0);
    $app->router->post('/deconnexion', [Auth::class ,"logout"],[AuthMiddleware::class],0);
    
    $app->router->get('/activation', [Auth::class ,"activateAccount"],[AuthMiddleware::class],1);
    $app->router->get('/reset-pwd', [Auth::class ,"resetPwd"],[AuthMiddleware::class],0);
    $app->router->get('/reset-pwd-mail', [Auth::class ,"resetPwdMail"],[AuthMiddleware::class],0);
    
    $app->router->post('/activation', [Auth::class ,"activateAccount"],[AuthMiddleware::class],1);
    $app->router->post('/reset-pwd', [Auth::class ,"resetPwd"],[AuthMiddleware::class],0);
    $app->router->post('/reset-pwd-mail', [Auth::class ,"resetPwdMail"],[AuthMiddleware::class],0);
    
    // Route agent front
    $app->router->post('/all-agents', [Agent::class ,"agent"],[AuthMiddleware::class],0);
    $app->router->get('/all-agents', [Agent::class ,"agent"],[AuthMiddleware::class],0);
    $app->router->post('/all-agents/{agent}', [Agent::class ,"getOneAgent"],[AuthMiddleware::class],0);    
    $app->router->get('/all-agents/{agent}', [Agent::class ,"getOneAgent"],[AuthMiddleware::class],0);    
  

    // Route annonce front
    $app->router->post('/annonce-all', [Annonce::class ,"displayAllAnnonce"],[AuthMiddleware::class],0);
    $app->router->get('/annonce-all', [Annonce::class ,"displayAllAnnonce"],[AuthMiddleware::class],0);    
    $app->router->post('/favoris', [Annonce::class ,"getAllFavoritesAnnonces"],[AuthMiddleware::class],0);
    $app->router->get('/favoris', [Annonce::class ,"getAllFavoritesAnnonces"],[AuthMiddleware::class],0);
    $app->router->post('/annonce/{annonceTitle}', [Annonce::class ,"getOneAnnonce"],[AuthMiddleware::class],0);
    $app->router->get('/annonce/{annonceTitle}', [Annonce::class ,"getOneAnnonce"],[AuthMiddleware::class],0);

    // Route newsletter
    $app->router->get('/subscribe-newsletter', [Newsletter::class ,"subscribe"],[AuthMiddleware::class],0);
    $app->router->post('/subscribe-newsletter', [Newsletter::class ,"subscribe"],[AuthMiddleware::class],0);
    $app->router->get('/unsubscribe-newsletter', [Newsletter::class ,"unsubscribe"],[AuthMiddleware::class],0);
    $app->router->post('/unsubscribe-newsletter', [Newsletter::class ,"unsubscribe"],[AuthMiddleware::class],0);
    
    // Route Account setting front
    $app->router->get('/account-settings', [Setting::class ,"setting"],[AuthMiddleware::class],1);
    $app->router->get('/modify-connexion', [Setting::class ,"modifyConnexion"],[AuthMiddleware::class],1);
    $app->router->get('/modify-info', [Setting::class ,"modifyInfo"],[AuthMiddleware::class],1);
    $app->router->get('/modify-password', [Setting::class ,"modifyPassword"],[AuthMiddleware::class],1);

    $app->router->post('/account-settings', [Setting::class ,"setting"],[AuthMiddleware::class],1);
    $app->router->post('/modify-connexion', [Setting::class ,"modifyConnexion"],[AuthMiddleware::class],1);
    $app->router->post('/modify-info', [Setting::class ,"modifyInfo"],[AuthMiddleware::class],1);
    $app->router->post('/modify-password', [Setting::class ,"modifyPassword"],[AuthMiddleware::class],1);

    //route avis
    $app->router->post('/add-opinion-agent', [Opinion::class ,"addOpinionAgent"],[AuthMiddleware::class],1);
    $app->router->post('/add-opinion-agence', [Opinion::class ,"addOpinionAgence"],[AuthMiddleware::class],1);
    $app->router->post('/show-opinion', [Opinion::class ,"showOpinion"],[AuthMiddleware::class],1);
    $app->router->get('/add-opinion-agent', [Opinion::class ,"addOpinionAgent"],[AuthMiddleware::class],1);
    $app->router->get('/add-opinion-agence', [Opinion::class ,"addOpinionAgence"],[AuthMiddleware::class],1);
    $app->router->get('/show-opinion', [Opinion::class ,"showOpinion"],[AuthMiddleware::class],1);

    $app->router->get('/back/opinion-list', [Opinion::class ,"opinionList"],[AuthMiddleware::class],3);
    $app->router->get('/back/opinion-valid', [Opinion::class ,"validOpinion"],[AuthMiddleware::class],3);
    $app->router->get('/back/opinion-delete', [Opinion::class ,"deleteOpinion"],[AuthMiddleware::class],3);
    $app->router->post('/back/opinion-list', [Opinion::class ,"opinionList"],[AuthMiddleware::class],3);
    $app->router->post('/back/opinion-valid', [Opinion::class ,"validOpinion"],[AuthMiddleware::class],3);
    $app->router->post('/back/opinion-delete', [Opinion::class ,"deleteOpinion"],[AuthMiddleware::class],3);

    //route favori
    $app->router->post('/favori-add', [Annonce::class ,"addFavori"],[AuthMiddleware::class],1);
    $app->router->post('/favori-del', [Annonce::class ,"removeFavori"],[AuthMiddleware::class],1);
    $app->router->get('/favori-add', [Annonce::class ,"addFavori"],[AuthMiddleware::class],1);
    $app->router->get('/favori-del', [Annonce::class ,"removeFavori"],[AuthMiddleware::class],1);

    // Route annonce back
    $app->router->get('/back/annonce', [Annonce::class ,"viewAnnonce"],[AuthMiddleware::class],2);
    
    $app->router->get('/back/add-annonce', [Annonce::class ,"addAnnonce"],[AuthMiddleware::class],2);
    $app->router->get('/back/update-annonce', [Annonce::class ,"updateAnnonce"],[AuthMiddleware::class],2);
    $app->router->get('/back/delete-annonce', [Annonce::class ,"deleteAnnonce"],[AuthMiddleware::class],2);
    $app->router->get('/back/restore-annonce', [Annonce::class ,"restoreAnnonce"],[AuthMiddleware::class],2);
    $app->router->get('/back/add-photo-annonce', [Annonce::class ,"photo"],[AuthMiddleware::class],2);
    
    $app->router->post('/back/add-annonce', [Annonce::class ,"addAnnonce"],[AuthMiddleware::class],2);
    $app->router->post('/back/update-annonce', [Annonce::class ,"updateAnnonce"],[AuthMiddleware::class],2);
    $app->router->post('/back/delete-annonce', [Annonce::class ,"deleteAnnonce"],[AuthMiddleware::class],2);
    $app->router->post('/back/restore-annonce', [Annonce::class ,"restoreAnnonce"],[AuthMiddleware::class],2);

    $app->router->post('/back/add-photo-annonce', [Annonce::class ,"photo"],[AuthMiddleware::class],2);
    
    
    // Route type back
    $app->router->get('/back/type', [Type::class ,"viewType"],[AuthMiddleware::class],2);
    
    $app->router->get('/back/add-type', [Type::class ,"addType"],[AuthMiddleware::class],2);
    $app->router->get('/back/update-type', [Type::class ,"updateType"],[AuthMiddleware::class],2);
    $app->router->get('/back/delete-type', [Type::class ,"deleteType"],[AuthMiddleware::class],2);
    $app->router->post('/back/add-type', [Type::class ,"addType"],[AuthMiddleware::class],2);
    $app->router->post('/back/update-type', [Type::class ,"updateType"],[AuthMiddleware::class],2);
    $app->router->post('/back/delete-type', [Type::class ,"deleteType"],[AuthMiddleware::class],2);
    
    // Route user back
    $app->router->get('/back/user', [Auth::class ,"listUser"],[AuthMiddleware::class],3);
    $app->router->post('/back/user', [Auth::class ,"listUser"],[AuthMiddleware::class],3);
    $app->router->get('/back/update-user', [Auth::class ,"updateUser"],[AuthMiddleware::class],3);
    $app->router->post('/back/update-user', [Auth::class ,"updateUser"],[AuthMiddleware::class],3);
    $app->router->get('/back/delete-user', [Auth::class ,"deleteUser"],[AuthMiddleware::class],3);
    $app->router->post('/back/delete-user', [Auth::class ,"deleteUser"],[AuthMiddleware::class],3);

    // Route agent back
    $app->router->get('/back/agent', [Agent::class ,"viewAgent"],[AuthMiddleware::class],3);
    $app->router->post('/back/agent', [Agent::class ,"viewAgent"],[AuthMiddleware::class],3);

    /*$app->router->get('/contact',[SiteController::class ,"contact"]);
    $app->router->get('/contact/{id}/test/{test}', [SiteController::class ,"contact"]);

    $app->router->post('/contact',[SiteController::class ,'handleContact']);*/
    
    // Route agent Self
    $app->router->post('/back/agent-info', [Agent::class ,"agentInfo"],[AuthMiddleware::class],2);
    $app->router->post('/back/agent-update', [Agent::class ,"updateAgent"],[AuthMiddleware::class],2);
    $app->router->get('/back/agent-info', [Agent::class ,"agentInfo"],[AuthMiddleware::class],2);
    $app->router->get('/back/agent-update', [Agent::class ,"updateAgent"],[AuthMiddleware::class],2);


    $app->run();



?>

<?php

namespace App\Controllers;



use App\Core\Mailer;
use App\Core\Controller;
use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;
use App\Models\UserCode;
use App\Models\UserPwdForget;
use App\Models\Connexion;
use App\Models\Status;
use App\Models\Agent;

class Auth extends Controller
{
    public function login(): String
    {

        $this->setView("Auth/login");
        $this->setTemplate('front');
        $form = new Login();
        $this->assign("form", $form->getConfig());

        if ($form->isSubmited() && $form->isValid()) {
            $user = new User();
            $user = $user->getOneWhere(['email' => $_POST['email']]);
            if(!isset($user->property)){
                if(password_verify($_POST['pwdLogin'], $user->getPwd())) {
                    $user->populateWithMail($_POST['email']);
                    $connexion = new Connexion();
                    $newToken = sha1(uniqid());
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['connected'] = true;
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['email'] = $_POST['email'];
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['firstname'] = $user->getFirstname();
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['lastname'] = $user->getLastname();
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'] = $user->getId();
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['status'] = $user->getStatus();
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif'] = $user->getActif();
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['token'] = $newToken;
                    $connexion = $connexion->populateWith(['id_user' => $user->getId()]);
                    if(isset($connexion->property)){ 
                        // Insertion nouveau token
                        $connexion = new Connexion();
                        $connexion->setIdUser($user->getId());
                        $connexion->setToken($newToken);
                        $connexion->save();
                    }
                    else{
                        // Actualisation de l'ancien token
                        $connexion->setIdUser($user->getId());
                        $connexion->setToken($newToken);
                        $connexion->save();
                    }

                    $_SESSION['error']['message'] = 'Connexion Reussie';
                    $_SESSION['error']['codeErorr'] = 1;
                    $_SESSION['error']['data'] = $_POST;
                    $redirection = $_SERVER['HTTP_REFERER'];
                    $redirectionExploded = explode("/", $redirection);
                    $redirection = end($redirectionExploded);
                    header('location: /account-settings');
                } else {    
                    $_SESSION['error']['message'] = 'Identifiant Incorrect';
                    $_SESSION['error']['codeErorr'] = 2;
                    $_SESSION['error']['data'] = $_POST;
                    $redirection = $_SERVER['HTTP_REFERER'];
                    $redirectionExploded = explode("/", $redirection);
                    $redirection = end($redirectionExploded);
                    //header('location: /'.$redirection);
                }
            }
            else{
                $_SESSION['error']['message'] = 'Identifiant Incorrect';
                $_SESSION['error']['codeErorr'] = 2;
                $_SESSION['error']['data'] = $_POST;
                $redirection = $_SERVER['HTTP_REFERER'];
                $redirectionExploded = explode("/", $redirection);
                $redirection = end($redirectionExploded);
                //header('location: /'.$redirection);
            }
        }
        
        $this->assign("formErrors", $form->errors);
        return $this->render();
    }

    public function register(): String
    {
        var_dump($_SESSION['error']);
        $this->setView("Auth/register");
        $this->setTemplate("front");
        $form=new Register();
        $this->assign("form", $form->getConfig());
        
        //Form validé ? et correct ?
        if($form->isSubmited() && $form->isValid()){
            $user = new User();
            $mailExist = $user->checkSomething(['email',$_POST['email']]);
            if($mailExist){
                // email deja existant
                header('location: /register');
            }
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd($_POST['pwd']);
            $user->save();

            $userAdd = $user->populateWithMail($_POST['email']);
            
            $newToken = sha1(uniqid());
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['connected'] = true;
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['email'] = $_POST['email'];
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['firstname'] = $userAdd->getFirstname();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['lastname'] = $userAdd->getLastname();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'] = $userAdd->getId();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['status'] = $userAdd->getStatus();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif'] = $userAdd->getActif();
            $_SESSION[''.$GLOBALS['prefixe'].'_login']['token'] = $newToken;
            $user_code = new UserCode();
            $user_code->setIdUser($userAdd->getId());
            $user_code->setCode($this->createCode());
            $user_code->save();
            // Envoie du mail
            $mail = new Mailer();
            $mail->sendMail($userAdd->getEmail(),$userAdd->getFirstname()." ".$userAdd->getLastname(),"Valider votre inscription sur Moving House","Voici votre code d'activation : ".$user_code->getCode()."");

            $connexion = new Connexion;
            $connexion->setIdUser($userAdd->getId());
            $connexion->setToken($newToken);   
            $connexion->save();
            header("location: /activation");
        }
        $this->assign("formErrors", $form->errors);
        return $this->render();
    }

    public function logout(): void
    {
        if(!isset($_SESSION[''.$GLOBALS['prefixe'].'_login'])){
            header("location: /");
        }

        $id_user = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];
        $connexion = new Connexion();
        $connexion = $connexion->populateWith(["id_user" => $id_user]);
        $connexion->save('del');
        unset($_SESSION[''.$GLOBALS['prefixe'].'_login']);
        if(isset($_SESSION[''.$GLOBALS['prefixe'].'_login'])){
             header('location: /?logout=false');
        }
        else{
             header('location: /?logout=true');
        }
    }

    public function listUser(): String
    {
        $this->setView("Auth/userList");
        $this->setTemplate("back");

        $user = new User();

        $this->assign("userList", $user->getAllWhere(["status < 4"]));
        
        return $this->render();

    }

    public function updateUser(): String
    {
        $this->setView("Auth/user-update");
        $this->setTemplate("back");

        $user = new User();
        $form = new Register();
        $status = new Status();
        $user = $user->populate($_GET["id"]);
        $this->assign("statusList", $status->getSelectInfo());
        $this->assign("formUpd", $form->getConfigUpdate());
        $this->assign("formUpdDate", $user->getConfigObject());

        if($form->isSubmited() && $form->isValid()){
            var_dump($_POST);
            $user = $user->populate($_POST["id"]);
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setStatus($_POST['status']);
            $user->setDateUpdated(date('Y-m-d H:i:s'));
            $user->save();
            if(isset($_POST['status']) && $_POST['status'] > 1){
                $agent = new Agent();
                $agent = $agent->populateWith(["is_user" => $user->getId()]);
                if(isset($agent->property) && $agent->property == 'pas de resultat'){
                    $agent = new Agent();
                }
                $agent->setIdUser($user->getId());
                $agent->setPhotoLink(' ');
                $agent->setDescription(' ');
                $agent->save();
            }
            header('location: /back/user');
        }
        $this->assign("formErrors", $form->errors);
        return $this->render();

    }

    public function deleteUser(): String
    {
        $this->setView("Auth/user-delete");
        $this->setTemplate("back");

        $user = new User();
        $form=new Register();
        $user = $user->populate($_GET["id"]);
        $this->assign("formDel", $form->getConfigDelete());
        $this->assign("formDelDate", $user->getConfigObject());

        if($form->isSubmited() && $form->isValid()){
            if($_POST['submit'] == 'Supprimer'){
                $user = $user->populate($_POST["id"]);
                $user->save('del');
                header('location: /back/user');
            }
            else{
                header('location: /back/user');
            }
        }

        $this->assign("formErrors", $form->errors);
        
        return $this->render();

    }

    private function createCode(){

        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);

    }

    public function activateAccount(){

        $this->setView("Auth/user-active");
        $this->setTemplate("front");

        $user_code = new UserCode();
        $user_code = $user_code->populateWith(["id_user" => $_SESSION[''.$GLOBALS['prefixe'].'_login']['id']]);
        if(isset($_GET['email']) && $_GET['email'] == "resend"){
            $userAdd = new User();
            $userAdd = $userAdd->populate($_SESSION[''.$GLOBALS['prefixe'].'_login']['id']);
            $mail = new Mailer();
            $mail->sendMail($userAdd->getEmail(),$userAdd->getFirstname()." ".$userAdd->getLastname(),"Valider votre inscription sur Moving House","Voici votre code d'activation : ".$user_code->getCode()."");
        }
        $form = new Login();
        $this->assign("formActivation", $form->getConfigActivation());
        $this->assign("formActivationData", $user_code->getConfigObject());
        if($form->isSubmited() && $form->isValid()){
            if($_POST['submit'] == 'Activer mon compte'){
                $user_code = $user_code->getOneWhere(["id"=>$_POST["id"]]);
                if($_POST['code'] == $user_code->getCode()){
                    echo($user_code->getIdUser());
                    $user = new User();
                    $user = $user->populate($user_code->getIdUser());
                    $user->setActif(true);
                    $user->save();
                    $user = $user->populate($user->getId());
                    $_SESSION[''.$GLOBALS['prefixe'].'_login']['actif'] = $user->getActif();
                    header("location: /");
                }
                else{
                    header('location: /activation?e=1');
                }
            }
            else{
                header('location: /activation?e=2');
            }
        }
        $this->assign("formErrors", $form->errors);
        return $this->render();
    } 

    public function resetPwd(): String 
    {
        if (!isset($_GET['token'])) 
        {
            header('location: /');
        }
        else 
        {
            $userPwdForget = new UserPwdForget();
            $userPwdForget = $userPwdForget->populateWith(['token'=>$_GET['token']]);
            $validity = date('Y-m-d H:i:s.u', strtotime($userPwdForget->getValidity()));
            $heure_supplementaire = strtotime('+1 hour', strtotime($validity));
            $validityPlus1Hour = date('Y-m-d H:i:s', $heure_supplementaire);
            $dateNow = date('Y-m-d H:i:s.u');
            if ($dateNow > $validityPlus1Hour)
            {
                header ("location: /");
            }
        }
        $this->setView("Auth/reset-pwd");
        $this->setTemplate("front");

        $form = new Login();
        $this->assign("form", $form->getConfigResetPwd());

        if ($form->isSubmited() && $form->isValid()) 
        {
            $user = new User();
            $user = $user->populate($_POST['id']);
            $user->setPwd($_POST['pwd']);
            $user->save();

            header('location: /');
        }

        $this->assign("formErrors", $form->errors);

        return $this->render();
    }

    public function resetPwdMail(): String 
    {
        $this->setView("Auth/reset-pwd-mail");
        $this->setTemplate("front");

        $form = new Login();
        $this->assign("form", $form->getConfigResetPwdMail());

        if ($form->isSubmited() && $form->isValid()) 
        {
            $user = new User();
            $mailClean = strtolower(trim($_POST['email']));
            $isMailExist = $user->checkSomething(["email",$mailClean]);

            if ($isMailExist)
            {
                $userPwdForget = new UserPwdForget();
                $userPwdForget-> setEmail($mailClean);
                $userPwdForget-> setToken(sha1(uniqid()));
                $userPwdForget->save();

                $mail = new Mailer();
                $mail->sendMail($userPwdForget->getEmail(),"","Mot de passe - Mooving House","Pour rénitialiser votre mot de passe, cliquer sur le lien suivant : http://localhost/reset-pwd?token=".$userPwdForget->getToken()."");
                
            }
            //header('location: /');
        }

        $this->assign("formErrors", $form->errors);

        return $this->render();
    }

}

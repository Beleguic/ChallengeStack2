<?php

namespace App\Controllers;



use App\Core\Mailer;
use App\Core\Controller;
use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;
use App\Models\UserCode;

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
                if(password_verify($_POST['pwd'], $user->getPwd())) {
                    $user->populateWithMail($_POST['email']);
                    $_SESSION['zfgh_login']['connected'] = true;
                    $_SESSION['zfgh_login']['email'] = $_POST['email'];
                    $_SESSION['zfgh_login']['firstname'] = $user->getFirstname();
                    $_SESSION['zfgh_login']['lastname'] = $user->getLastname();
                    $_SESSION['zfgh_login']['id'] = $user->getId();
                    $_SESSION['zfgh_login']['status'] = $user->getStatus();
                    $_SESSION['zfgh_login']['actif'] = $user->getActif();
                    //echo "Identifiant Correct";
                    header('location: /?conn=true');
                } else {
                    echo "Identifiant Incorrect";
                }
            }
            else{
                echo "Identifiant Incorrect";
            }
        }
        
        $this->assign("formErrors", $form->errors);
        return $this->render();
    }

    public function register(): String
    {
        $this->setView("Auth/register");
        $this->setTemplate("front");
        $form=new Register();
        $this->assign("form", $form->getConfig());
        
        //Form validé ? et correct ?
        if($form->isSubmited() && $form->isValid()){
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd($_POST['pwd']);
            $user->save();

            $userAdd = $user->populateWithMail($_POST['email']);
            $_SESSION['zfgh_login']['connected'] = true;
            $_SESSION['zfgh_login']['email'] = $_POST['email'];
            $_SESSION['zfgh_login']['firstname'] = $userAdd->getFirstname();
            $_SESSION['zfgh_login']['lastname'] = $userAdd->getLastname();
            $_SESSION['zfgh_login']['id'] = $userAdd->getId();
            $_SESSION['zfgh_login']['status'] = $userAdd->getStatus();
            $_SESSION['zfgh_login']['actif'] = $userAdd->getActif();
            $user_code = new UserCode();
            $user_code->setIdUser($userAdd->getId());
            $user_code->setCode($this->createCode());
            $user_code->save();
            // Envoie du mail
            $mail = new Mailer();
            $mail->sendMail($userAdd->getEmail(),$userAdd->getFirstname()." ".$userAdd->getLastname(),"Valider votre inscription sur Moving House","Voici votre code d'activation : ".$user_code->getCode()."");
            header("location: /activation");
        }
        $this->assign("formErrors", $form->errors);
        return $this->render();
    }

    public function logout(): void
    {
        unset($_SESSION['zfgh_login']);
        if(isset($_SESSION['zfgh_login'])){
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

        $this->assign("userList", $user->getAll());
        
        return $this->render();

    }

    public function updateUser(): String
    {
        $this->setView("Auth/user-update");
        $this->setTemplate("back");

        $user = new User();
        $form=new Register();
        $user = $user->populate($_GET["id"]);
        $this->assign("formUpd", $form->getConfigUpdate());
        $this->assign("formUpdDate", $user->getConfigObject());

        if($form->isSubmited() && $form->isValid()){
            $user = $user->populate($_POST["id"]);
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->save();
            header('location: /back/user');
        }
        
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


        
        return $this->render();

    }

    private function createCode(){

        return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);

    }

    

    public function activateAccount(){

        $this->setView("Auth/user-active");
        $this->setTemplate("front");

        $user_code = new UserCode();
        $user_code = $user_code->populateWith(["id_user" => $_SESSION['zfgh_login']['id']]);
        if(isset($_GET['email']) && $_GET['email'] == "resend"){
            $userAdd = new User();
            $userAdd = $userAdd->populate($_SESSION['zfgh_login']['id']);
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
                    $user = new User();
                    $user = $user->populate($user_code->getIdUser());
                    $user->setActif(true);
                    $_SESSION['zfgh_login']['actif'] = true;
                    $user->save();
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

        return $this->render();
    } 

    public function resetPwd(): String 
    {
        if (!isset($_GET['id'])) 
        {
            header('location: /');
        }
        $this->setView("Auth/reset-pwd");
        $this->setTemplate("front");

        $form = new Login();
        $this->assign("form", $form->getConfigResetPwd());

        if ($form->isSubmited() && $form->isValid()) 
        {
            $user = new User();
            $user = $user->populate($_GET['id']);
            $user->setPwd($_POST['pwd']);
            $user->save();

            header('location: /');
        }

 

        return $this->render();
    }

}

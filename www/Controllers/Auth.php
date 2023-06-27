<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;

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

}

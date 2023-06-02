<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;

class Auth
{
    public function login(): void
    {
        $form = new Login();
        $view = new View("Auth/login", "front");
        $view->assign("form", $form->getConfig());

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
        
        $view->assign("formErrors", $form->errors);
    }

    public function register(): void
    {
        $form = new Register();
        $view = new View("Auth/register", "front");
        $view->assign("form", $form->getConfig());

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        
        //Form validé ? et correct ?
        if($form->isSubmited() && $form->isValid()){
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPwd($_POST['pwd']);
            $user->save();
        }
        $view->assign("formErrors", $form->errors);
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
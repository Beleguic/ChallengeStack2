<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User as UserModel;
use App\Forms\Login as UserForm;
class Setting extends Controller
{
  public function setting(): String
  {
    if(!isset($_SESSION[''.$GLOBALS['prefixe'].'_login'])) {
      header('Location : /');
    }
      $user = new UserModel();
      $userId = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];

      $this->setView("Settings/account-settings");
      $this->setTemplate("front");

      $this->assign("userInfo", $user->populate($userId));

      return $this->render();
  }

  public function modifyConnexion(): String
  {
    $this->setView("Settings/modify-connexion");
    $this->setTemplate("front");
      
    $user = new UserModel();
    $userId = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];
    $formChangeEmail = new UserForm();

    $this->assign("form", $formChangeEmail->getConfigChangeEmail());

    if ($formChangeEmail->isSubmited() && $formChangeEmail->isValid()) {
      $user = $user->populate($userId);
      $user->setDateUpdated(date('Y-m-d H:i:s'));
      $user->setEmail($_POST['email']);
      $user->save();
      header('location: /account-settings');
    }

    return $this->render();
  }

  public function modifyInfo(): String
  {
      $this->setView("Settings/modify-info");
      $this->setTemplate("front");
        
      $user = new UserModel();
      $userId = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];
      $formChangeInfo = new UserForm();

      $this->assign("form", $formChangeInfo->getConfigChangeInfo());

      if ($formChangeInfo->isSubmited() && $formChangeInfo->isValid()) {
        $user = $user->populate($userId);
        $user->setDateUpdated(date('Y-m-d H:i:s'));
        $user->setLastname($_POST['lastname']);
        $user->setFirstname($_POST['firstname']);
        $user->save();
        header('location: /account-settings');
      }
  
      return $this->render();
  }

  public function modifyPassword(): String
  {
    $this->setView("Settings/modify-password");
    $this->setTemplate("front");

    $user = new UserModel();
    $userId = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];
    $formChangePwd = new UserForm();
    
    $this->assign("form", $formChangePwd->getConfigChangePwd());

    if ($formChangePwd->isSubmited() && $formChangePwd->isValid()) {
      $user = $user->populate($userId);
      if(password_verify($_POST['pwdActuel'], $user->getPwd())) {
        $user->setDateUpdated(date('Y-m-d H:i:s'));
        $user->setPwd($_POST['pwd']);
        $user->save();
        header('location: /account-settings');
      }
      else{
        $formChangePwd->errors[] = "erreur mdp";
      }
    }
    $this->assign("formErrors", $formChangePwd->errors);
    return $this->render();
  }
}
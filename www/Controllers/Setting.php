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
      $user = new UserModel();
      $userId = $_SESSION['zfgh_login']['id'];

      $this->setView("Settings/account-settings");
      $this->setTemplate("front");

      $this->assign("userInfo", $user->populate($userId));

      return $this->render();
  }

  public function modifyConnexion(): String
  {
      $user = new UserModel();
      $userId = $_SESSION['zfgh_login']['id'];

      $this->setView("Settings/modify-connexion");
      $this->setTemplate("front");

      $this->assign("userInfo", $user->populate($userId));

      return $this->render();
  }

  public function modifyInfo(): String
  {
      $user = new UserModel();
      $userId = $_SESSION['zfgh_login']['id'];

      $this->setView("Settings/modify-info");
      $this->setTemplate("front");

      $this->assign("userInfo", $user->populate($userId));

      return $this->render();
  }

  public function modifyPassword(): String
  {
    $this->setView("Settings/modify-password");
    $this->setTemplate("front");

    $user = new UserModel();
    $userId = $_SESSION['zfgh_login']['id'];
    $formChangePwd = new UserForm();
    
    $this->assign("form", $formChangePwd->getConfigChangePwd());

    if ($formChangePwd->isSubmited() && $formChangePwd->isValid()) {
      $user = $user->populate($userId);
      if(password_verify($_POST['pwdActuel'], $user->getPwd())) {
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
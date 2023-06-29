<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User as UserModel;

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
      $user = new UserModel();
      $userId = $_SESSION['zfgh_login']['id'];

      $this->setView("Settings/modify-password");
      $this->setTemplate("front");

      $this->assign("userInfo", $user->populate($userId));

      return $this->render();
  }
}
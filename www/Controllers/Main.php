<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\User as UserModel;

class Main extends Controller
{
    public function home(): String
    {
        // Affiche les annonces 3 par lignes
        $pseudo = "Prof";
        //$view = new View("Main/home", "front"); 

        $this->setView("Main/home");
        $this->setTemplate("front");
        // Appelle la l'objet Vue 
        // Vassigner a la vue le fichier main/home sur le tamplete front
        // la vue va appeller le template puis la vue precise ...
        $this->assign("pseudo", $pseudo); // Passe des variable dans la vue avec assign 
        $this->assign("age", 30);
        $this->assign("titleseo", "supernouvellepage");

        return $this->render();

    }

    public function dashboard(): String
    {
        $this->setView("Main/dashboard");
        $this->setTemplate("back");

        return $this->render();
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

    public function parametre(): String
    {
        $user = new UserModel();
        $userId = $_SESSION['zfgh_login']['id'];

        $this->setView("Main/parametre");
        $this->setTemplate("front");

        $this->assign("userInfo", $user->populate($userId));

        return $this->render();
    }
}
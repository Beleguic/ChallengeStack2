<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

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

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

    public function annonceAppartement(): void
    {
        $view = new View("Main/annonce-appartement", "front");
    }
}
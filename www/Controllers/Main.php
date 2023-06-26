<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class Main extends Controller
{
    public function home(): void
    {
        // Affiche les annonces 3 par lignes
        $pseudo = "Prof";
        $view = new View("Main/home", "front"); 
        // Appelle la l'objet Vue 
        // Vassigner a la vue le fichier main/home sur le tamplete front
        // la vue va appeller le template puis la vue precise ...
        $view->assign("pseudo", $pseudo); // Passe des variable dans la vue avec assign 
        $view->assign("age", 30);
        $view->assign("titleseo", "supernouvellepage");
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

}
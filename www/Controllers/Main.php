<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Forms\Contact;
use App\Models\v_Agent as v_AgentModel;
use App\Models\v_Annonce;

class Main extends Controller
{
    public function home(): String
    {
        $pseudo = "Prof";
        $agent = new v_AgentModel();
        $annnonce = new v_Annonce();
        
        $this->setView("Main/home");
        $this->setTemplate("front");
        
        $this->assign("bestAgents", $agent->getAll());
        $this->assign("carrousselAnnonce", $annnonce->getAll());
        $this->assign("pseudo", $pseudo);
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

    public function contact(): String
    {
        $this->setView("Main/contact");
        $this->setTemplate("front");

        $formContact = new Contact();
  
        $this->assign("contactForm", $formContact->getConfig());
        
        if ($formContact->isSubmited() && $formContact->isValid()) {
            // TODO : Envoyer le message
        }

        return $this->render();
    }

    public function aboutUs(): String
    {

        $agent = new v_AgentModel();

        $this->setView("Main/about-us");
        $this->setTemplate("front");

        $this->assign("teamAgents", $agent->getAll());

        return $this->render();
    }
}
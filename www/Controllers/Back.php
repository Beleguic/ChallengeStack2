<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
use App\Models\v_Agent as agent;

class Back extends Controller

{

    public function viewAgent(): String
    {

        //$view = new View("Annonce/annonce-view", "back");
        $this->setView("Back/agent-view");
        $this->setTemplate("back");

        $agent = new agent();

        $this->assign("agentList", $agent->getAll());
        
        return $this->render();
    }

}
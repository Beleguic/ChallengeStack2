<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Forms\Contact;

class Agent extends Controller
{
    public function agent1(): String
    {
        $this->setView("Agent/agent1");
        $this->setTemplate("front");

        return $this->render();
    }

    public function agent2(): String
    {
        $this->setView("Agent/agent2");
        $this->setTemplate("front");

        return $this->render();
    }

    public function agent3(): String
    {
        $this->setView("Agent/agent3");
        $this->setTemplate("front");

        return $this->render();
    }
}
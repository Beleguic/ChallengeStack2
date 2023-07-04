<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
use App\Models\v_Agent as agent;
use App\Models\Status;
use App\forms\Status as StatusForm;

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

    public function viewStatus(): String
    {

    	$this->setView("Back/status-view");
        $this->setTemplate("back");

        $status = new Status();

        $this->assign("statusList", $status->getAll());
        
        return $this->render();

    }

    public function addStatus(): String
    {
    	$this->setView("Back/status-add");
        $this->setTemplate("back");

        $formAdd = new StatusForm();
        $status = new Status();

        $this->assign("formAdd", $formAdd->getConfig());

        if($formAdd->isSubmited() && $formAdd->isValid()){
        	$status->setIdStatus($_POST['id_status']);
        	$status->setStatus($_POST['status']);
        	$status->save();
        	header("location: /back/status");
        }

        return $this->render();

    }

    public function updateStatus(): String
    {

    	$this->setView("Back/status-update");
        $this->setTemplate("back");

        $formAdd = new StatusForm();
        $status = new Status();
        $status = $status->populate($_GET['id']);
        $this->assign("formUpd", $formAdd->getConfigUpdate());
        $this->assign("formUpdData", $status->getConfigObject());

        if($formAdd->isSubmited() && $formAdd->isValid()){
        	if($_POST['submit'] == 'Modifier le statut'){
	        	$status = $status->populate($_POST['id']);
	        	$status->setIdStatus($_POST['id_status']);
	        	$status->setStatus($_POST['status']);
	        	$status->save();
        		header("location: /back/status");
        	}
        	else{
        		header("location: /back/status");
        	}
        }

        return $this->render();


    }

    public function deleteStatus(): String
    {
    	$this->setView("Back/status-delete");
        $this->setTemplate("back");

        $formAdd = new StatusForm();
        $status = new Status();
        $status = $status->populate($_GET['id']);
        $this->assign("formDel", $formAdd->getConfigDelete());
        $this->assign("formDelData", $status->getConfigObject());

        if($formAdd->isSubmited() && $formAdd->isValid()){
        	if($_POST['submit'] == 'Supprimer'){
        		$status = $status->populate($_POST['id']);
        		$status->save('del');
        		header("location: /back/status");
        	}
        	else{
        		header("location: /back/status");
        	}
        }

        return $this->render();

    }

}
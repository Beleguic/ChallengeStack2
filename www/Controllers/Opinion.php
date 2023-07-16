<?php

namespace App\Controllers;
use App\Core\Controller;

use App\Models\Opinion as OpinionModel;
use App\Forms\Opinion as OpinionForm;

class Opinion extends Controller

{
    public function showOpinion(): String
    {

        $this->setView("Opinion/opinion-show"); // vue ajout type
        $this->setTemplate("front");

        $opinion = new OpinionModel();
        // faire un process pour savoir si agence ou non
        $this->assign("opinionList", $opinion->getAll());
        return $this->render();

    }

    public function addOpinionAgent(): String
    {
        $this->setView("Opinion/opinion-add"); // vue ajout type
        $this->setTemplate("front");

        if(!isset($_GET['id_agent'])){
            header('location: /add-opinion-agence');
        }

        $formOpinion = new OpinionForm(); // genere le model Type (Formulaire Ajout)
        $opinion = new OpinionModel(); // miroir BDD de la table type

        // envoie les information du formulaire a la view
        $this->assign("formOpinion", $formOpinion->getConfigAddOpinion()); 
        $this->assign("id_agent", $_GET['id_agent']);

        if($formOpinion->isSubmited() && $formOpinion->isValid()){

            $opinion->setNote($_POST['note']);
            $opinion->setCommentaire($_POST['commentaire']);
            $opinion->setIdAgent($_POST['id_agent']);
            $opinion->setIdUser($_SESSION['zfgh_login']['id']);
            $opinion->save();
            header('location: /show-opinion');
        }
        $this->assign("formErrors", $formOpinion->errors);
        return $this->render();

    }

    public function addOpinionAgence(): String
    {
        $this->setView("Opinion/opinion-add"); // vue ajout type
        $this->setTemplate("front");

        $formOpinion = new OpinionForm(); // genere le model Type (Formulaire Ajout)
        $opinion = new OpinionModel(); // miroir BDD de la table type

        // envoie les information du formulaire a la view
        $this->assign("formOpinion", $formOpinion->getConfigAddOpinion()); 

        if($formOpinion->isSubmited() && $formOpinion->isValid()){

            if(isset($_POST['anonyme'])){
                $opinion->setIdUser($_SESSION['zfgh_login']['id']);
            }
            $opinion->setNote($_POST['note']);
            $opinion->setCommentaire($_POST['commentaire']);
            $opinion->setIdAgent($_SESSION['zfgh_login']['id']);
            $opinion->setIdUser($_SESSION['zfgh_login']['id']);
            $opinion->setAvisAgence(1);
            $opinion->save();
            //header('location: /show-opinion');
        }
        $this->assign("formErrors", $formOpinion->errors);
        return $this->render();

    }

    public function opinionList(): String
    {
        $this->setView("Opinion/opinion-list"); // vue ajout type
        $this->setTemplate("back");

        $opinion = new OpinionModel();
        $this->assign("opinionNotValid", $opinion->getAllWhere(["is_valid = false"]));
        $this->assign("opinionValid", $opinion->getAllWhere(["is_valid = true"]));

        return $this->render();
    }

    public function validOpinion(): void
    {
        if(!isset($_GET['id'])){
            header('location: /back/opinion-list');
        }

        $opinion = new OpinionModel();
        $opinion = $opinion->populate($_GET['id']);
        $opinion->setIsValid("TRUE");
        if(!$opinion->getAvisAgence()){
            $opinion->setAvisAgence("FALSE");
        }
        $opinion->save();

        header('location: /back/opinion-list'); 

    }

    public function deleteOpinion(): void
    {
        if(!isset($_GET['id'])){
            header('location: /back/opinion-list');
        }

        $opinion = new OpinionModel();
        $opinion = $opinion->populate($_GET['id']);
        $opinion->save('del');

        header('location: /back/opinion-list'); 

    }


}
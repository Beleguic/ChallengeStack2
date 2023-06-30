<?php

namespace App\Controllers;
use App\Core\Controller;

use App\Core\View;
use App\Forms\Type as TypeForm;
use App\Models\Type as TypeModel;

class Type extends Controller

{
    public function viewType(): String
    {

        $this->setView("Type/type-view"); // vue ajout type
        $this->setTemplate("back");

        $type = new TypeModel();
        
        $this->assign("typeList", $type->getAll());
        return $this->render();

    }

    public function addType(): String
    {
        $this->setView("Type/type-add"); // vue ajout type
        $this->setTemplate("back");

        $formAdd = new TypeForm(); // genere le model Type (Formulaire Ajout)
        $type = new TypeModel(); // miroir BDD de la table type

        // envoie les information du formulaire a la view
        $this->assign("formAdd", $formAdd->getConfigAdd()); 

        if($formAdd->isSubmited() && $formAdd->isValid()){
           
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /back/type');
        }
        $this->assign("formErrors", $formAdd->errors);
        return $this->render();

    }

    public function updateType(): String
    {
        if(!isset($_GET['id'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /back/type');
        }

        $this->setView("Type/type-update"); // vue ajout type
        $this->setTemplate("back");

        $formUpd = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populate($_GET["id"]);
        $this->assign("formUpd", $formUpd->getConfigUpdate());
        $this->assign("formUpdDate", $type->getConfigObject());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $type = $type->populate($_POST["id"]);
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /back/type');
        }
        $this->assign("formErrors", $formUpd->errors);
        return $this->render();
    }

    public function deleteType(): String
    {

        var_dump($_POST);

        if(!isset($_GET['id'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Type/type-delete"); // vue ajout type
        $this->setTemplate("back");

        $formDel = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populate($_GET["id"]);
        $this->assign("formDel", $formDel->getConfigDelete());
        $this->assign("formDelDate", $type->getConfigObject());

        if($formDel->isSubmited() && $formDel->isValid()){
            if($_POST['submit'] == 'Supprimer'){
                $type = $type->populate($_POST["id"]);
                $type->save('del');
                header('location: /back/type');
            }
            else{
                header('location: /back/type');
            }
        }
        $this->assign("formErrors", $formDel->errors);
        return $this->render();
        
        
    }



}
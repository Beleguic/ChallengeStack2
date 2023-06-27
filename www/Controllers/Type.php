<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Type as TypeForm;
use App\Models\Type as TypeModel;

class Type

{
    public function viewType(): void
    {

        $this->setView("Type/type"); // vue ajout type
        $this->setTemplate("back");

        $type = new TypeModel();
        
        
        //$formDel = new TypeForm(); // genere le model Type (Formulaire Delete)
        
         
        //$view->assign("formDel", $formDel->getConfigDelete());

        /*
            Si modification : $_GET['update'] = true
            Si delete : $_GET['delete'] = true
        */

        /*if(isset($_GET['update']) && $_GET['update']){ // Update
            if($formUpd->isSubmited() && $formUpd->isValid()){
                $type = $type->populateWithIdHash($_POST["id_hash"]);
                $type->setTexte($_POST['texte']);
                $type->save();
                header('location: /ajout-type');
            }
        }
        else if(isset($_GET['delete']) && $_GET['delete']){
            if($formDel->isSubmited() && $formDel->isValid()){
                $type = $type->populateWithIdHash($_POST["id_hash"]);
                $type->save('del');
                header('location: /ajout-type');
            }
        }
        else if(isset($_POST['texte'])){
            if($formAdd->isSubmited() && $formAdd->isValid()){
               
                $type->setTexte($_POST['texte']);
                $type->save();
                header('location: /ajout-type');
            }
            $view->assign("formErrors", $formAdd->errors);
        }*/

        $this->assign("typeList", $type->getAll());
        //Permet de Visualiser les donnée de Type
        return $this->render();

    }

    public function addType(): void
    {
        $this->setView("Type/add-type"); // vue ajout type
        $this->setTemplate("back");

        $formAdd = new TypeForm(); // genere le model Type (Formulaire Ajout)
        $type = new TypeModel(); // miroir BDD de la table type

        // envoie les information du formulaire a la view
        $this->assign("formAdd", $formAdd->getConfigAdd()); 

        if($formAdd->isSubmited() && $formAdd->isValid()){
           
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /view-type');
        }
        $this->assign("formErrors", $formAdd->errors);
        return $this->render();

    }

    public function updateType(): void
    {
        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Type/update-type"); // vue ajout type
        $this->setTemplate("back");

        $formUpd = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populateWithIdHash($_GET["id_hash"]);
        $this->assign("formUpd", $formUpd->getConfigUpdate());
        $this->assign("formUpdDate", $type->getConfigObject());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $type = $type->populateWithIdHash($_POST["id_hash"]);
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /view-type');
        }
        $this->assign("formErrors", $formUpd->errors);
        return $this->render();
    }

    public function deleteType(): void
    {

        var_dump($_POST);

        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Type/delete-type"); // vue ajout type
        $this->setTemplate("back");

        $formDel = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populateWithIdHash($_GET["id_hash"]);
        $this->assign("formDel", $formDel->getConfigDelete());
        $this->assign("formDelDate", $type->getConfigObject());

        if($formDel->isSubmited() && $formDel->isValid()){
            if($_POST['submit'] == 'Supprimer'){
                $type = $type->populateWithIdHash($_POST["id_hash"]);
                $type->save('del');
                header('location: /view-type');
            }
            else{
                header('location: /view-type');
            }
        }
        $this->assign("formErrors", $formDel->errors);
        return $this->render();
        
        
    }



}
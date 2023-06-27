<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Type as TypeForm;
use App\Models\Type as TypeModel;

class Type

{
    public function viewType(): void
    {

        $view = new View("Type/type-view", "back");

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

        $view->assign("typeList", $type->getAll());
        //Permet de Visualiser les donnée de Type

    }

    public function addType(): void
    {
        $view = new View("Type/type-add", "back"); // vue ajout type

        $formAdd = new TypeForm(); // genere le model Type (Formulaire Ajout)
        $type = new TypeModel(); // miroir BDD de la table type

        // envoie les information du formulaire a la view
        $view->assign("formAdd", $formAdd->getConfigAdd()); 

        if($formAdd->isSubmited() && $formAdd->isValid()){
           
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /view-type');
        }
        $view->assign("formErrors", $formAdd->errors);

    }

    public function updateType(): void
    {
        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $view = new View("Type/type-update", "back"); // vue ajout type

        $formUpd = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populateWithIdHash($_GET["id_hash"]);
        $view->assign("formUpd", $formUpd->getConfigUpdate());
        $view->assign("formUpdDate", $type->getConfigObject());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $type = $type->populateWithIdHash($_POST["id_hash"]);
            $type->setTexte($_POST['texte']);
            $type->save();
            header('location: /view-type');
        }
        $view->assign("formErrors", $formUpd->errors);

    }

    public function deleteType(): void
    {

        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $view = new View("Type/type-delete", "back"); // vue ajout type

        $formDel = new TypeForm(); // genere le model Type (Formulaire Update)
        $type = new TypeModel();
        $type = $type->populateWithIdHash($_GET["id_hash"]);
        $view->assign("formDel", $formDel->getConfigDelete());
        $view->assign("formDelDate", $type->getConfigObject());

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
        $view->assign("formErrors", $formDel->errors);
        
        
    }



}
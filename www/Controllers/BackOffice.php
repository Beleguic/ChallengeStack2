<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Type;
use App\Models\Type as TypeModel;

class BackOffice

{
    public function typeAnnonce(): void
    {

        $view = new View("BackOffice/type", "back");

        $type = new TypeModel();
        
        $formAdd = new Type(); // genere le model Type (Formulaire Ajout)
        $formUpd = new Type(); // genere le model Type (Formulaire Update)
        $formDel = new Type(); // genere le model Type (Formulaire Delete)
        
        $view->assign("formAdd", $formAdd->getConfigAdd()); // Recupere les info du form 
        $view->assign("formUpd", $formUpd->getConfigUpdate());
        $view->assign("formDel", $formDel->getConfigDelete());

        /*
            Si modification : $_GET['update'] = true
            Si delete : $_GET['delete'] = true
        */

        if(isset($_GET['update']) && $_GET['update']){ // Update
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
        }

        $view->assign("typeList", $type->getAll());
        // Permet d'ajouter/modifier/supprimer un type d'annonce

    }



}
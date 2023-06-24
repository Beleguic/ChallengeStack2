<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Annonce as AnnonceForm;
use App\Models\Annonce as AnnonceModel;
use App\Models\Type as TypeModel;

class Annonce

{
    public function viewAnnonce(): void
    {

        $view = new View("Annonce/annonce-view", "back");

        $annonce = new AnnonceModel();
        
        
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

        $view->assign("annonceList", $annonce->getAll());
        //Permet de Visualiser les donnée de Type

    }

    public function addAnnonce(): void
    {
        $view = new View("Annonce/annonce-add", "back"); // vue ajout type

        $formAdd = new AnnonceForm(); // genere le model Type (Formulaire Ajout)
        //var_dump($formAdd);
        //var_dump($formAdd->getConfigAdd());
        $annonce = new AnnonceModel(); // miroir BDD de la table type
        $type = new TypeModel();

        // envoie les information du formulaire a la view
        $view->assign("typeList", $type->getSelectInfo());
        $view->assign("formAdd", $formAdd->getConfigAdd()); 

        if($formAdd->isSubmited() && $formAdd->isValid()){
            $annonce->setTitre($_POST['titre']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setPrix($_POST['superficieMaison']);
            $annonce->setPrix($_POST['superficieTerrain']);
            $annonce->setPrix($_POST['nbrPiece']);
            $annonce->setPrix($_POST['nbrChambre']);
            $annonce->setPrix($_POST['ville']);
            $annonce->setPrix($_POST['rue']);
            $annonce->setPrix($_POST['departement']);
            $annonce->setPrix($_POST['regions']);
            
            $annonce->save();
            header('location: /view-annonce');
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

        $view = new View("Annonce/annonce-update", "back"); // vue ajout type

        $formUpd = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $annonce = $annonce->populateWithIdHash($_GET["id_hash"]);
        $view->assign("formUpd", $formUpd->getConfigUpdate());
        $view->assign("formUpdDate", $annonce->getConfigObject());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $annonce = $annonce->populateWithIdHash($_POST["id_hash"]);
            $annonce->setTitre($_POST['titre']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setPrix($_POST['superficieMaison']);
            $annonce->setPrix($_POST['superficieTerrain']);
            $annonce->setPrix($_POST['nbrPiece']);
            $annonce->setPrix($_POST['nbrChambre']);
            $annonce->setPrix($_POST['ville']);
            $annonce->setPrix($_POST['rue']);
            $annonce->setPrix($_POST['departement']);
            $annonce->setPrix($_POST['regions']);
            $annonce->save();
            header('location: /view-annonce');
        }
        $view->assign("formErrors", $formUpd->errors);

    }

    public function deleteType(): void
    {

        var_dump($_POST);

        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $view = new View("Annonce/annonce-delete", "back"); // vue ajout type

        $formDel = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $annonce = $annonce->populateWithIdHash($_GET["id_hash"]);
        $view->assign("formDel", $formDel->getConfigDelete());
        $view->assign("formDelDate", $annonce->getConfigObject());

        if($formDel->isSubmited() && $formDel->isValid()){
            if($_POST['submit'] == 'Supprimer'){
                $annonce = $annonce->populateWithIdHash($_POST["id_hash"]);
                $annonce->save('del');
                header('location: /view-annonce');
            }
            else{
                header('location: /view-annonce');
            }
        }
        $view->assign("formErrors", $formDel->errors);
        
        
    }



}
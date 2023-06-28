<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
use App\Forms\Annonce as AnnonceForm;
use App\Models\Annonce as AnnonceModel;
use App\Models\v_Annonce as v_AnnonceModel;
use App\Models\Type as TypeModel;

class Annonce extends Controller

{

    public function getOneAnnonce($annonceTitle): String
    {
        $this->setView("Annonce/annonce-one");
        $this->setTemplate("front");
        $annonce = new v_AnnonceModel();
        //var_dump($annonceTitle[0]);
        //var_dump($annonce->getOneWhere(["titre"=>str_replace('%20', ' ', $annonceTitle[0])]));
        $this->assign("annonceOne", $annonce->getOneWhere(["titre"=>str_replace('%20', ' ', $annonceTitle[0])]));
        
        return $this->render();
    }

    public function viewAnnonce($args): String
    {
        var_dump($args);
        //$view = new View("Annonce/annonce-view", "back");
        $this->setView("Annonce/annonce-view");
        $this->setTemplate("back");

        $annonce = new v_AnnonceModel();

        $this->assign("annonceList", $annonce->getAll());
        
        return $this->render();
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

       
        //Permet de Visualiser les donnée de Type

    }

    public function addAnnonce(): String
    {
        $this->setView("Annonce/annonce-add"); // vue ajout type
        $this->setTemplate("back");

        $formAdd = new AnnonceForm(); // genere le model Type (Formulaire Ajout)
        $annonce = new AnnonceModel(); // miroir BDD de la table type
        $type = new TypeModel();

        // envoie les information du formulaire a la view
        $this->assign("typeList", $type->getSelectInfo());
        $this->assign("formAdd", $formAdd->getConfigAdd()); 
        if($formAdd->isSubmited() && $formAdd->isValid()){
            $annonce->setIdHash();
            $annonce->setTitre($_POST['titre']);
            $annonce->setIdType($_POST['id_type']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setSuperficieMaison($_POST['superficieMaison']);
            $annonce->setSuperficieTerrain($_POST['superficieTerrain']);
            $annonce->setNbrPiece($_POST['nbrPiece']);
            $annonce->setNbrChambre($_POST['nbrChambre']);
            $annonce->setVille($_POST['ville']);
            $annonce->setRue($_POST['rue']);
            $annonce->setDepartement($_POST['departement']);
            $annonce->setRegions($_POST['regions']);
            
            $annonce->save();
            header('location: /view-annonce');
        }
        $this->assign("formErrors", $formAdd->errors);
        return $this->render();

    }

    public function updateAnnonce(): String
    {
        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Annonce/annonce-update"); // vue ajout type
        $this->setTemplate("back");

        $formUpd = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $type = new TypeModel();
        $annonce = $annonce->populateWithIdHash($_GET["id_hash"]);
        $this->assign("formUpd", $formUpd->getConfigUpdate());
        $this->assign("formUpdDate", $annonce->getConfigObject());
        $this->assign("typeList", $type->getSelectInfo());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $annonce = $annonce->populateWithIdHash($_POST["id_hash"]);
            $annonce->setIdHash();
            $annonce->setTitre($_POST['titre']);
            $annonce->setIdType($_POST['id_type']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setSuperficieMaison($_POST['superficieMaison']);
            $annonce->setSuperficieTerrain($_POST['superficieTerrain']);
            $annonce->setNbrPiece($_POST['nbrPiece']);
            $annonce->setNbrChambre($_POST['nbrChambre']);
            $annonce->setVille($_POST['ville']);
            $annonce->setRue($_POST['rue']);
            $annonce->setDepartement($_POST['departement']);
            $annonce->setRegions($_POST['regions']);
            $annonce->save();
            header('location: /back/annonce');
        }
        $this->assign("formErrors", $formUpd->errors);
        return $this->render();
    }

    public function deleteAnnonce(): String
    {

        if(!isset($_GET['id_hash'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Annonce/annonce-delete"); // vue ajout type
        $this->setTemplate("back");

        $formDel = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $annonce = $annonce->populateWithIdHash($_GET["id_hash"]);
        $this->assign("formDel", $formDel->getConfigDelete());
        $this->assign("formDelDate", $annonce->getConfigObject());
        echo('here');
        if($formDel->isSubmited() && $formDel->isValid()){
            echo('here');

            if($_POST['submit'] == 'Supprimer'){
                $annonce = $annonce->populateWithIdHash($_POST["id_hash"]);
                $annonce->save('del');
                header('location: /back/annonce');
            }
            else{
                header('location: /back/annonce');
            }
        }
        $this->assign("formErrors", $formDel->errors);
        return $this->render();
        
    }



}
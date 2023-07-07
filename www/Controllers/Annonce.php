<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
use App\Forms\Annonce as AnnonceForm;
use App\Models\Annonce as AnnonceModel;
use App\Models\v_Annonce as v_AnnonceModel;
use App\Models\Type as TypeModel;
use App\Models\AnnonceMemento as AnnonceMemento;
use App\Models\Favori;

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

    public function viewAnnonce(): String
    {

        //$view = new View("Annonce/annonce-view", "back");
        $this->setView("Annonce/annonce-view");
        $this->setTemplate("back");

        $annonce = new v_AnnonceModel();
        $type = new TypeModel();
        $result = $type->getNumberOfType();
        if($result == 0){
            $this->assign("showAdd",false);
        }
        else{
            $this->assign("showAdd",true);
        }

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
        $type = new TypeModel();
        // envoie les information du formulaire a la view
        $result = $type->getNumberOfType();
        if($result == 0){
            header("location: /back/annonce");
        }


        $this->setView("Annonce/annonce-add"); // vue ajout type
        $this->setTemplate("back");

        $formAdd = new AnnonceForm(); // genere le model Type (Formulaire Ajout)
        $annonce = new AnnonceModel(); // miroir BDD de la table type
        // envoie les information du formulaire a la view
        $this->assign("typeList", $type->getSelectInfo());
        $this->assign("formAdd", $formAdd->getConfigAdd()); 
        if($formAdd->isSubmited() && $formAdd->isValid()){
            $annonce->setTitre($_POST['titre']);
            $annonce->setIdType($_POST['id_type']);
            $annonce->setIdAgent($_SESSION['zfgh_login']['id']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setSuperficieMaison($_POST['superficieMaison']);
            $annonce->setSuperficieTerrain($_POST['superficieTerrain']);
            $annonce->setNbrPiece($_POST['nbrPiece']);
            $annonce->setNbrChambre($_POST['nbrChambre']);
            $annonce->setVille($_POST['ville']);
            $annonce->setRue($_POST['rue']);
            $annonce->setDepartement($_POST['departement']);
            $annonce->setDescription($_POST['description']);
            $annonce->setRegions($_POST['regions']);
            $annonce->save();
            header('location: /back/annonce');
        }
        $this->assign("formErrors", $formAdd->errors);
        return $this->render();

    }

    public function updateAnnonce(): String
    {
        if(!isset($_GET['id'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Annonce/annonce-update"); // vue ajout type
        $this->setTemplate("back");

        $formUpd = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $type = new TypeModel();
        $annonce = $annonce->populate($_GET["id"]);
        $this->assign("formUpd", $formUpd->getConfigUpdate());
        $this->assign("formUpdDate", $annonce->getConfigObject());
        $this->assign("typeList", $type->getSelectInfo());

        if($formUpd->isSubmited() && $formUpd->isValid()){
            $annonceMemento = new AnnonceMemento();
            $annonce = $annonce->populate($_POST["id"]);
            $annonceMemento->backup($annonce);
            $annonce->setTitre($_POST['titre']);
            $annonce->setIdType($_POST['id_type']);
            $annonce->setIdAgent($_SESSION['zfgh_login']['id']);
            $annonce->setPrix($_POST['prix']);
            $annonce->setSuperficieMaison($_POST['superficieMaison']);
            $annonce->setSuperficieTerrain($_POST['superficieTerrain']);
            $annonce->setNbrPiece($_POST['nbrPiece']);
            $annonce->setNbrChambre($_POST['nbrChambre']);
            $annonce->setVille($_POST['ville']);
            $annonce->setRue($_POST['rue']);
            $annonce->setDepartement($_POST['departement']);
            $annonce->setDescription($_POST['description']);
            $annonce->setRegions($_POST['regions']);
            $annonce->save();
            header('location: /back/annonce');
        }
        $this->assign("formErrors", $formUpd->errors);
        return $this->render();
    }

    public function deleteAnnonce(): String
    {

        if(!isset($_GET['id'])){
            $_SESSION['error-report']['text'] = "Une erreur s'est produite";
            $_SESSION['error-report']['code'] = "Code 1";
            header('location: /view-type');
        }

        $this->setView("Annonce/annonce-delete"); // vue ajout type
        $this->setTemplate("back");

        $formDel = new AnnonceForm(); // genere le model Type (Formulaire Update)
        $annonce = new AnnonceModel();
        $annonce = $annonce->populate($_GET["id"]);
        $this->assign("formDel", $formDel->getConfigDelete());
        $this->assign("formDelDate", $annonce->getConfigObject());
        if($formDel->isSubmited() && $formDel->isValid()){
            if($_POST['submit'] == 'Supprimer'){
                $annonce = $annonce->populate($_POST["id"]);
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

    public function restoreAnnonce(): String
    {
        

        if(isset($_GET['idAnnonce'])){
            $annonce = new AnnonceModel(); // objet annonce
            $annonceMemento = new AnnonceMemento(); // objet annonce memeneto
            // recupere le memento
            $annonceMemento = $annonceMemento->populate($_GET['idAnnonce']);
            $idAnnoceActuelle = $annonceMemento->getIdAnnonce();
            $annonceMemento = new AnnonceMemento();
            // recupere l'id de l'annonce actuel pour la sauvegarder
            $annonceMemento->backup($annonce->populate($idAnnoceActuelle));
            // peuple l'objet annonce avec les donnée de la restauration
            $annonceRestore = new AnnonceModel();
            $annonceRestore = $annonceMemento->restore($_GET['idAnnonce']);
            // met a jour la restauration dans les annonces.
            $annonceRestore->save();
            header("location: /back/annonce?restore=true");
        }

        if(!isset($_GET['id'])){
            header("location: /back/annonce");
        }

        // genere la vue pour la liste des snapshot dispo + restuaration de la snapshot
        $this->setView("Annonce/annonce-restore"); // vue ajout type
        $this->setTemplate("back");

        $annonceMemento = new AnnonceMemento();
        //$AnnonceMemento = $AnnonceMemento->populateWith(['id_annonce' => $_GET['id']]);
        $where[] = "id_annonce = '".$_GET['id']."'";
        $order = ['date_memento', "ASC"];
        $this->assign('resMemento', $annonceMemento->getAllWhere($where,$order));

        return $this->render();

    }


    public function addFavori(): Void
    {

        // Ajoute un favorie pour l'utilisateur

        if(!isset($_SESSION['zfgh_login']['id'])){
            exit;
        }

        if(!isset($_GET['id_annonce']) && is_string($_GET['id_annonce'])){
            exit;
        }

        $favori = new Favori();
        $favori->setIdUser($_SESSION['zfgh_login']['id']);
        $favori->setIdAnnonce($_GET['id_annonce']);
        $favori->save();

    }

    public function removeFavori(): Void
    {

        // Ajoute un favorie pour l'utilisateur
        if(!isset($_SESSION['zfgh_login']['id'])){
            exit;
        }

        if(!isset($_GET['id_annonce']) && !is_string($_GET['id_annonce'])){
            exit;
        }

        $favori = new Favori();
        $favori->setIdUser($_SESSION['zfgh_login']['id']);
        $favori->setIdAnnonce($_GET['id_annonce']);
        $favori->delWhere();

    }

}
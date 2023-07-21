<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Forms\Contact;
use App\Models\Agent as AgentModel;
use App\Models\v_Agent as v_AgentModel;
use App\Forms\Agent as AgentForm;
use App\Models\User as UserModel;
use App\Models\Opinions as UserAvis;


class Agent extends Controller
{
    public function agent(): String
    {
        $this->setView("Agent/all-agents");
        $this->setTemplate("front");
        $agent = new v_AgentModel();
        $this->assign("allAgents", $agent->getAll());

        return $this->render();
    }

    public function getOneAgent($id):string
    {
        $this->setView("Agent/agent-one");
        $this->setTemplate("front");
        $agent = new v_AgentModel();
        $avis = new UserAvis();
        $this->assign("agentOne", $agent->getOneWhere(["id" => str_replace('%20', ' ', $id[0])]));
        $this->assign("avisCommentaire", $avis->getAllWere(['id_agent = '.$agent->getIdAgent()]));
        return $this->render();
    }

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

    public function updateAgent(): String
    {

        $this->setView("Agent/updateAgent");
        $this->setTemplate("back");

        $formAgent = new AgentForm();

        $agent = new AgentModel();
        $agent = $agent->populateWith(['id_user' => $_SESSION['zfgh_login']['id']]);
        if(isset($agent->property) && $agent->property == 'pas de resultat'){
            $agent = new AgentModel();
            $this->assign("agentInfo", []);
            $this->assign("form", $formAgent->getConfigAdd());
        }
        else{
            $this->assign("agentInfo", $agent->getConfigObject());
            $this->assign("form", $formAgent->getConfigUpdate());
        }

        if($formAgent->isSubmited() && $formAgent->isValid()){

            $error=array();
            $extension=array("jpeg","jpg","png");
            var_dump($_FILES);
            foreach($_FILES["photo"]["tmp_name"] as $key=>$tmp_name) {
                $file_name_new = sha1(uniqid());
                $file_name=$_FILES["photo"]["name"][$key];
                $file_tmp=$_FILES["photo"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                $path = 'asset/data/agent/'.$file_name_new.'.'.$ext;
                if(in_array($ext,$extension)) {
                    if(!file_exists($path)) {
                        if(move_uploaded_file($file_tmp=$_FILES["photo"]["tmp_name"][$key],$path)){
                            $agent->setPhotoLink($path);
                        }
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $path='asset/data/agent/'.$filename.time().".".$ext;
                        if(move_uploaded_file($file_tmp=$_FILES["photo"]["tmp_name"][$key],$path)){
                            // Ajout BDD
                            $agent->setPhotoLink($path);
                        }
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }

            $agent->setIdUser($_SESSION['zfgh_login']['id']);
            
            $agent->setDescription($_POST['description']);
            $agent->setTelephone($_POST['telephone']);
            $agent->setMobile($_POST['mobile']);
            $agent->setSkype($_POST['skype']);
            $agent->setFacebook($_POST['facebook']);
            $agent->setTwitter($_POST['twitter']);
            $agent->setInstagram($_POST['instagram']);
            $agent->setLinkedin($_POST['linkedin']);
            $agent->save();
            header("location: /back/agent-info");
        }

        return $this->render();

    }

    public function agentInfo(): String
    {
        $user = new UserModel();
        $agent = new v_AgentModel();

        $userId = $_SESSION[''.$GLOBALS['prefixe'].'_login']['id'];

        $this->setView("Agent/agent-info");
        $this->setTemplate("back");

        $this->assign("userInfo", $user->populate($userId));
        $this->assign("agentInfo", $agent->populate($userId));


        return $this->render();
    }

    public function viewAgent(): String
    {

        //$view = new View("Annonce/annonce-view", "back");
        $this->setView("Back/agent-view");
        $this->setTemplate("back");

        $agent = new agent();

        $this->assign("agentList", $agent->getAll());
        
        return $this->render();
    }
}
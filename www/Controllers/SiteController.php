<?php



namespace App\Controllers;
use App\Core\Application;
use App\Core\Controller;
use App\Forms\Annonce as AnnonceForm;


class SiteController extends Controller
{

    public function contact($id )
    {
        return $this->render("contact");
    }

    
    function test($content){
        echo($content['annonceTitle']); 
        //echo('je suis dans le controller steController avec la mthode test');

    }


    public function home()
    {
        $params = [
            'name' => "Afonso Jason"
        ];
        $formAdd = new AnnonceForm();

        $this->assign("test",$params);
        $this->assign("formAdd", $formAdd->getConfigAdd()); 

        $this->setTemplate("front");
        $this->setView("home");
        
        return $this->render();
    }

    static function handleContact()
    {
        return "envoie de la donnée";
    }





}

?>
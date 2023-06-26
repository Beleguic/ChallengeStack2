<?php



namespace App\Controllers;
use App\Core\Application;
use App\Core\Controller;
use App\Forms\Annonce as AnnonceForm;


class SiteController extends Controller
{

    public function contact($id )
    {
        echo "<pre>";
        var_dump($id);
        echo "</pre>";
        return $this->render("contact");
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
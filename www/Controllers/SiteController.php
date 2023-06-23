<?php



namespace App\Controllers;
use App\Core\Application;
use App\Core\Controller;


class SiteController extends Controller
{

    public function contact()
    {
        return $this->render("contact");
    }



    public function home()
    {
        $params = [
            'name' => "Afonso Jason"
        ];
        return $this->render("home",$params);
    }

    static function handleContact()
    {
        return "envoie de la donnée";
    }





}

?>
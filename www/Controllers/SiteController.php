<?php



namespace App\Controllers;
use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;


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

    static function handleContact(Request $request)
    {
        $body=Application::$app->request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return "envoie de la doSnnée";
    }





}

?>
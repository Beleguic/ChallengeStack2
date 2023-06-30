<?php

namespace App\Core;
use App\Core\Application;


class Controller
{

	private $data = [];
	private String $view;
    private String $template;

	public function assign(String $key, $value): void
    {
        $this->data[$key] = $value;
    }


    /**
     * @param String $view
     */
    public function setView(string $view): void
    {
    	if($view == "_404"){
    		$this->view = "Views/".$view.".php";
    	}
    	else{
    		$this->view = "Views/".$view.".view.php";
    	}
        //
        if(!file_exists($this->view)){
        	$this->diePage("je suis un message");
            //die("La vue ".$this->view." n'existe pas");
        }
    }

    /**
     * @param String $template
     */
    public function setTemplate(string $template): void
    {


        $this->template = "Views/layout/".$template.".tpl.php";
        if(!file_exists($this->template)){
        	$this->diePage("je suis un message");
            //die("Le template ".$this->template." n'existe pas");
        }
    }

    public function render()
    {
        return Application::$app->router->renderView($this->view,$this->template, $this->data);
    }

    public function diePage($message=""){
        echo('la');
        $message = ["code404" => $message];

        http_response_code(404);
		
		$this->setView("_404");
		$this->setTemplate("_404");
		$this->data = $message;
		

        return $this->render();
        

    }
        
}










?>
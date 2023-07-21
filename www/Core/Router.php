<?php

    namespace App\Core;

    use App\Models\User;
    class Router
    {

        protected array $routes = [];
        public Request $request;
        public Response $response;

        private $data = [];

        private String $view;
        private String $template;
        private String $newsletter;

        /**
         * @param String $view
         */
        public function setView(string $view): void
        {
            $this->view = "Views/".$view.".view.php";
            if(!file_exists($this->view)){
                die("La vue ".$this->view." n'existe pas");
            }
        }

        public function setNewsLetter(string $newsletter): void
        {
            $this->newsletter = "Views/".$newsletter.".view.php";
            if(!file_exists($this->newsletter)){
                die("La vue ".$this->newsletter." n'existe pas");
            }
        }

        /**
         * @param String $template
         */
        public function setTemplate(string $template): void
        {
            $this->template = "Views/".$template.".tpl.php";
            if(!file_exists($this->template)){
                die("Le templatee ".$this->template." n'existe pas");
            }
        }
        


        public function __construct(Request $request,Response $response){
            $this->request = $request;
            $this->response = $response;

        }

        public function get($path,$callback, array $middleware = null, int $role = 0){
            $this->routes['get'][$path] =[
                "callback" => $callback,
                "middleware" => $middleware,
                "role" => $role
                ];
        }


        public function post($path,$callback,array $middleware = null, int $role = 0){
            $this->routes['post'][$path] =[
                "callback" => $callback,
                "middleware" => $middleware,
                "role" => $role
                ];
        }

        public function resolve()
        {
            
;            $path=$this->request->getPath();
            $method = $this->request->getMethod();
            $params = [];


            $callback = $this->routes[$method][$path]["callback"] ?? false;
            $role = $this->routes[$method][$path]["role"] ?? false;

            
            
            
            if (strpos($path, "/api") !== false) {
               
                
            }else{
                $user = new User();
                if(isset($_SESSION["".$GLOBALS['prefixe']."_login"]["connected"]) && $_SESSION["".$GLOBALS['prefixe']."_login"]["connected"]){
                $user=$user->populate($_SESSION["".$GLOBALS['prefixe']."_login"]["id"]);
                }else{
                    $user->setStatus(0);
                
            }
            foreach ($this->routes[$method] as $route => $routeCallback) {
                $pattern = $this->convertToRegex($route);
                
                if (preg_match($pattern, $path, $matches)) {
                    if($routeCallback["middleware"] != null){
                        $middleware = new $routeCallback["middleware"][0]($role, $user);
                        
                        if(!$middleware->execute()){
                        echo "salut";
                            if(isset($_SESSION["".$GLOBALS['prefixe']."_login"]["connected"]) && $_SESSION["".$GLOBALS['prefixe']."_login"]["connected"]){
                                $this->response->setStatutCode(403);
                                return $this->renderView("Views/_403.php","Views/layout/_403.tpl.php");
                            }else{
                                
                                return $this->renderView("Views/_404.php","Views/layout/_404.tpl.php");
                            }
                            
                        }
                        
                    
                    }
                    
                        $callback = $routeCallback["callback"];
                    array_shift($matches); // Supprime la première correspondance qui contient le chemin complet
                    $params = $matches;
                    
                    
                    
                    // La route correspond, enregistrez le rappel (callback) et les paramètres
                    
                }
            }
            }
            
            
            

            

            


            



       
            if($callback === false){
            
                $this->response->setStatutCode(404);
                return $this->renderView("Views/_404.php","Views/layout/_404.tpl.php");
            }
          
            if(is_string($callback)){
                echo("@@@@@@@@@@@@@@@@@@@@@@@@ Probleme, si ce message s'affiche, le dire sur discord Merci (Ligne 84 du Router.php @@@@@@@@@@@@@@@@@@@@@@@@@@@");
                return $this->renderView("View/".$callback.".php","Views/layout/front.tpl.php");
            }

            if(is_array($callback)){
                $callback[0] = new $callback[0]();
                 // Cette ligne crée une nouvelle instance de la classe spécifiée dans la première position du tableau $callback. Cela permet d'instancier la classe pour appeler sa méthode.
            }
        
            return call_user_func($callback,$params);
        }

        private function convertToRegex($route)
        {
            $pattern = preg_replace('/\//', '\\/', $route);
            $pattern = preg_replace('/\{([a-zA-Z]+)\}/', '(?P<\1>[^\/]+)', $pattern);
            $pattern = '/^' . $pattern . '$/';

            return $pattern;
        }

        public function renderView($view,$template,$params = []){
            $this->data = $params;
            $layoutContent = $this->layoutContent($template);
            $viewContent = $this->renderOnlyView($view);
            if ($template == "Views/layout/front.tpl.php" || $template == "front")
            {
                $this->setNewsletter("newsletter");
                $newsletterContent = $this->renderOnlyView($this->newsletter);
                $newsletter = str_replace('{{newsletter}}', $newsletterContent, $layoutContent);
            }
            else
            {
                $newsletter = $layoutContent;
            }
            return str_replace('{{content}}', $viewContent, $newsletter);
        }


        protected function layoutContent($template)
        {
            ob_start();
            include $template;
            return ob_get_clean();
        }

        protected function renderOnlyView($view){

            ob_start();
            include $view;
            return ob_get_clean();
            
            
        }

        // Genere le formulaire
        public function partial(String $name, array $config, array $inputData=[] ,$errors = [],): void
        {
            if(!file_exists("Views/Partials/".$name.".ptl.php")){
                //die("Le partial ".$name." n'existe pas");
            }
            include "Views/Partials/".$name.".ptl.php";
        }
/*
        public function diePage($message=""){
            echo('je passe dans le die page <br>');
            //$message = ["code404" => $message];

            $this->response->setStatutCode(404);
            return $this->renderView("_404","front");

        }*/





    }





?>
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


        public function __construct(Request $request,Response $response){
            $this->request = $request;
            $this->response = $response;

        }

        public function get($path, $callback,$middleware = null,$role = 0)
        {
            $this->routes['get'][$path] = [
                'callback' => $callback,
                'middleware'=>$middleware,
                'role' => $role

            ];
        }

        public function post($path,$callback){
            $this->routes['post'][$path] = $callback;
        }

        public function resolve()
        {

            $user = new User();
            $user->setFirstname("jason");
            $user->setLastname("afonso");
            $user->setEmail("test@gmail.com");
            $user->setPwd("pass");
            $user->setRole(3);

        






            $path=$this->request->getPath();
            $method = $this->request->getMethod();
            $callbackData= $this->routes[$method][$path] ?? false;

            if ($callbackData) {
                $callback = $callbackData['callback'];
                $role = $callbackData['role'];
                if(isset($callbackData['middleware'][0])){
                    $middleware = new $callbackData['middleware'][0]($role,$user);
                }
                
            }
            
            foreach ($this->routes[$method] as $route => $routeCallback) {
                $pattern = $this->convertToRegex($route);
                if (preg_match($pattern, $path, $matches)) {
                    // La route correspond, enregistrez le rappel (callback) et les paramètres
                    $callback = $routeCallback;
                    array_shift($matches); // Supprime la première correspondance qui contient le chemin complet
                    $params = $matches;
                    break;
                }
            }







            if($callback ===false){
                $this->response->setStatutCode(404);
                return $this->renderView("Views/_404.php","Views/layout/_404.tpl.php");
            }
          
            if(is_string($callback)){
                echo("@@@@@@@@@@@@@@@@@@@@@@@@ Probleme, si ce message s'affiche, le dire sur discord Merci (Ligne 84 du Router.php @@@@@@@@@@@@@@@@@@@@@@@@@@@");
                return $this->renderView("View/".$callback.".php","Views/layout/front.tpl.php");
            }

            if(is_array($callback)){
                if(isset($middleware)){
                    $middleware->execute();
                }
                
                $callback["callback"][0]= new $callback["callback"][0](); // Cette ligne crée une nouvelle instance de la classe spécifiée dans la première position du tableau $callback. Cela permet d'instancier la classe pour appeler sa méthode.
                
            }
        
            return call_user_func($callback["callback"],[
                "roles"=>$role,
                "params"=>$params
            ]);
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
            return str_replace('{{content}}', $viewContent, $layoutContent);
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
<?php

    namespace App\Core;
    class Router
    {

        protected array $routes = [];
        public Request $request;
        public Response $response;


        public function __construct(Request $request,Response $response){
            $this->request = $request;
            $this->response = $response;

        }

        public function get($path,$callback){
            $this->routes['get'][$path] = $callback;
        }


        public function post($path,$callback){
            $this->routes['post'][$path] = $callback;
        }

        public function resolve()
        {
            $path=$this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;
            
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
                return $this->renderView("_404");
            }
          
            if(is_string($callback)){
                return $this->renderView($callback);
            }

            if(is_array($callback)){
                $callback[0] = new $callback[0](); // Cette ligne crée une nouvelle instance de la classe spécifiée dans la première position du tableau $callback. Cela permet d'instancier la classe pour appeler sa méthode.
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

        public function renderView($view,$params =[]){

            $layoutContent = $this->layoutContent();
            $viewContent = $this->renderOnlyView($view,$params);
            return str_replace('{{content}}', $viewContent, $layoutContent);
        }

        public function renderContent($viewContent){

            $layoutContent = $this->layoutContent();
            return str_replace('{{content}}', $viewContent, $layoutContent);
        }


        protected function layoutContent()
        {
            ob_start();
            include "Views/layout/main.php";
            return ob_get_clean();
        }

        protected function renderOnlyView($view,$params){

            foreach($params as $key => $value){
                $$key = $value;
            }
            ob_start();
            include "Views/" . $view . ".php";
            return ob_get_clean();
        }





    }





?>
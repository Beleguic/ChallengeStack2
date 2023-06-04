<?php

    namespace App\Core;
    class Router
    {

        protected array $routes = [];
        public Request $request;

        public function __construct(Request $request){
            $this->request = $request;

        }

        public function get($path,$callback){
            $this->routes['get'][$path] = $callback;
        }

        public function resolve()
        {
            $path=$this->request->getPath();
            $method = $this->request->getMethod();
            $callback = $this->routes[$method][$path] ?? false;

            if($callback ===false){
                echo"not found";
                exit;
            }
            print_r($this->routes);
            echo call_user_func($callback);

        }






    }





?>
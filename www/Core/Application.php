<?php

namespace App\Core;

class Application
{

    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }


    public function run(){
        try{
            echo $this->router->resolve();
        }catch(\Exception $e){
            echo "acces refusé";
        }
       



    }







}




?>
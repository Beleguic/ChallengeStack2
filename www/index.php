<?php

    namespace App;
    use App\Core\Application;

    //require "Core/View.php";

    spl_autoload_register(function ($class) {

        //$class = App\Core\View
        $class = str_replace("App\\","", $class);
        //$class = Core\View
        $class = str_replace("\\","/", $class);
        //$class = Core/View
        $classForm = $class.".form.php";
        $class = $class.".php";
        //$class = Core/View.php
        if(file_exists($class)){
            include $class;
        }else if(file_exists($classForm)){
            include $classForm;
        }
    });

    $app = new Application();



    $app->router->get('/',function(){
        return 'salut';
    });

    $app->router->get('/contact',function(){
        return 'contact';
    });


    $app->run();



?>

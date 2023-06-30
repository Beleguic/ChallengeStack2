<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
// use App\Models\Newsletter;
use App\Forms\Newsletter as NewsletterForm;
use App\Models\Newsletter as NewsletterModel;

class Newsletter extends Controller 
{
    public function subscribe()
    {
        $redirection = $_SERVER['HTTP_REFERER'];
        $redirectionExploded = explode("/", $redirection);
        $redirection = end($redirectionExploded);
        //formulaire
        $form = new NewsletterForm();
        $form->getConfigNewsletter();
        if ($form->isSubmited() && $form->isValid()) 
        {
            $newsletter = new NewsletterModel();
            $mailClean = strtolower(trim($_POST['email']));
            $isMailExist = $newsletter->checkSomething(['email',$mailClean]);
            if (!$isMailExist) 
            {
            $newsletter->setEmail($_POST['email']);
            $newsletter->save();
            }
            header('location: /'.$redirection);
        }    

    }
}
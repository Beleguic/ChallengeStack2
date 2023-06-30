<?php

namespace App\Controllers;
use App\Core\Controller;

//use App\Core\View;
// use App\Models\Newsletter;
use App\Core\Mailer;
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
                $newsletter = $newsletter->populateWithMail($_POST['email']);
                $email = new Mailer();
                $email->sendMail($newsletter->getEmail(),"","Newsletter - Mooving House","Félicitation vous êtes abboné à la nawsletter de Mooving House !! /n /n Se désabonner de la newsletter http://localhost/unsubscribe-newsletter/?user=".$newsletter->getId()."");
            }
            header('location: /'.$redirection);
        }    

    }

    public function unsubscribe()
    {
        if (!isset($_GET['user'])) 
        {
            header('location: /');
        }
        else
        {
            //$_GET['user'] = id
            $newsletter = new NewsletterModel();
            $newsletter->populate($_GET['user']);
            if(!isset($newsletter->property))
            {
                $newsletter->save('del');
                header('location: /');
            }
            else
            {
                header('location: /');               
            }
        }

    }

}
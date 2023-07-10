<?php
namespace App\Forms;
use App\Core\Validator;

class Contact extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"contact-form",
                    "class"=>"php-email-form",
                    "enctype"=>"",
                    "submit"=>["Envoyer le message"],
                ],
                "submit"=>[
                    "Envoyer le message" => [
                        "id" => "",
                        "class" => "btn btn-a"
                    ],
                ],
                "divs"=>[
                    "div-name-email" =>[
                        "id" => "div-contact-name-email",
                        "class" => "row pb-3",
                        "inside" => ["name","email"]
                    ],
                    "div-subject" =>[
                        "id" => "div-contact-subject",
                        "class" => "div-form-100 pb-3",
                        "inside" => ["subject"]
                    ],
                    "div-message" =>[
                        "id" => "div-contact-message",
                        "class" => "div-form-50 pb-3",
                        "inside" => ["message"]
                    ],
                ],
                "inputs"=>[
                    "name"=>[
                        "divId"=>"",
                        "divClass"=>"col-md-6",
                        "id"=>"contact-form-name",
                        "class"=>"form-control form-control-lg form-control-a",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        "label" =>[
                            
                            "for" => "contact-form-name",
                            "id" => "label-contact-form-name",
                            "class" => "form-label color-a",
                            "value" => ""
                        ],
                        "required"=>true
                    ],
                    "email"=>[
                        "divId"=>"",
                        "divClass"=>"col-md-6",
                        "id"=>"contact-form-email",
                        "class"=>"form-control form-control-lg form-control-a",
                        "placeholder"=>"Votre E-mail",
                        "type"=>"email",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        "label" =>[
                            "for" => "contact-form-email",
                            "id" => "label-contact-form-email",
                            "class" => "form-label  color-a",
                            "value" => ""
                        ],
                        "required"=>true
                    ],
                    "subject"=>[
                        "id"=>"contact-form-subject",
                        "class"=>"form-control form-control-lg form-control-a",
                        "placeholder"=>"L'objet du message",
                        "type"=>"subject",
                        "error"=>"Votre subject est incorrect",
                        "label" =>[
                            "balise" => "label",
                            "for" => "contact-form-subject",
                            "id" => "label-contact-form-subject",
                            "class" => "form-label color-a",
                            "value" => ""
                        ],
                        "required"=>true
                    ],
                    "message"=>[
                        "balise" => "textarea",
                        "rows" => "8",
                        "id"=>"contact-form-message",
                        "class"=>"form-control",
                        "placeholder"=>"Votre message",
                        "type"=>"text",
                        "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                        "label" =>[
                            "balise" => "label",
                            "for" => "contact-form-message",
                            "id" => "label-contact-form-message",
                            "class" => "form-label  color-a",
                            "value" => ""
                        ],
                        "required"=>true
                    ],
                ]
        ];
        return $this->config;
    }
}
    
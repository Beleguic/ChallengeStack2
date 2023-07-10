<?php
namespace App\Forms;
use App\Core\Validator;

class Newsletter extends Validator
{
    public $method = "POST";
    protected array $config = [];

    
    public function getConfigNewsletter(): array 
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"/subscribe-newsletter",
                    "id"=>"register-form",
                    "class"=>"php-email-form",
                    "enctype"=>"",
                    "submit"=>["S'inscrire"],
                ],
                "submit"=>[
                    "S'inscrire" => [
                        "id" => "",
                        "class" => "btn btn-outline-b-n btn-block m-4 w-50"
                    ],
                ],
                "divs"=>[
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["email"]
                    ],
                ],
                "inputs"=>[
                    "email"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"login-form-email",
                        "class"=>"form-control",
                        "placeholder"=>"E-mail",
                        "type"=>"email",
                        "label" =>[
                            "for" => "login-form-email",
                            "id" => "label-login-form-email",
                            "class" => "form-label color-a",
                            "value" => "Votre adresse e-mail"
                        ],
                        "required"=>true
                    ],          
                ]
        ];
        return $this->config;
    }
}
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
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["S'inscrire"],
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
                        "placeholder"=>"Email",
                        "type"=>"email",
                        "label" =>[
                            "for" => "login-form-email",
                            "id" => "label-login-form-email",
                            "class" => "form-label",
                            "value" => "Votre adresse e-mail"
                        ],
                        "required"=>true
                    ],          
                ]
        ];
        return $this->config;
    }
}
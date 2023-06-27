<?php
namespace App\Forms;
use App\Core\Validator;

class Login extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"login-form",
                "class"=>"form",
                "enctype"=>"",
                "submit"=>["Se connecter"]
            ],
            "submit"=>[
                "Se connecter" => [
                    "id" => "",
                    "class" => ""
                ],
            ],
            "divs"=>[
                "div-email" =>[
                    "id" => "div-login-email",
                    "class" => "form-group div-form-100 col-md-6 mx-auto",
                    "inside" => ["email"]
                ],
                "div-pwd" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100 col-md-6 mx-auto",
                    "inside" => ["pwd"]
                ],
            ],
            "inputs"=>[
                "email"=>[
                    "id"=>"login-form-email",
                    "class"=>"form-control",
                    "placeholder"=>"Email",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "label" =>[
                        "for" => "login-form-email",
                        "id" => "label-login-form-email",
                        "class" => "form-label",
                        "value" => "Adresse mail"
                    ],
                    "required"=>true
                ],
                "pwd"=>[
                    "id"=>"login-form-pwd",
                    "class"=>"form-control",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Votre mot de passe est incorrect",
                    "label" =>[
                        "for" => "login-form-pwd",
                        "id" => "label-login-form-pwd",
                        "class" => "form-label",
                        "value" => "Mot de passe"
                    ],
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }
}
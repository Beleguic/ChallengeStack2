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
                "submit"=>"Se connecter",
                "reset"=>"Annuler"
            ],
            "inputs"=>[
                "div-email" =>[
                    "balise" => "div",
                    "id" => "div-login-email",
                    "class" => "div-form-100"
                ],
                "label-email" =>[
                    "balise" => "label",
                    "for" => "login-form-email",
                    "id" => "label-login-form-email",
                    "class" => "form-label",
                    "value" => "Adresse mail"
                ],
                "email"=>[
                    "balise" => "input",
                    "id"=>"login-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Email",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "required"=>true
                ],
                "end-div-firstname-lastname" => [
                    "balise" => "end-div"
                ],
                "div-pwd" =>[
                    "balise" => "div",
                    "id" => "div-login-pwd",
                    "class" => "div-form-100"
                ],
                "label-pwd" =>[
                    "balise" => "label",
                    "for" => "login-form-pwd",
                    "id" => "label-login-form-pwd",
                    "class" => "form-label",
                    "value" => "Mot de passe"
                ],
                "pwd"=>[
                    "balise" => "input",
                    "id"=>"login-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Votre mot de passe est incorrect",
                    "required"=>true
                ],
                "end-div-pwd" => [
                    "balise" => "end-div"
                ],
            ]
        ];
        return $this->config;
    }
}
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
                "email"=>[
                    "id"=>"login-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Email",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "required"=>true
                ],
                "pwd"=>[
                    "id"=>"login-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Votre mot de passe est incorrect",
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }
}
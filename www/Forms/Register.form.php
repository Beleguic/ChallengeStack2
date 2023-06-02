<?php
namespace App\Forms;
use App\Core\Validator;

class Register extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>"Nous rejoindre",
                    "reset"=>"Annuler"
                ],
                "inputs"=>[
                    "div-firstname-lastname" =>[
                        "balise" => "div",
                        "id" => "div-register-firstname-lastname",
                        "class" => "div-form-50"
                    ],
                    "label-firstname" =>[
                        "balise" => "label",
                        "for" => "register-form-firstname",
                        "id" => "label-register-form-firstname",
                        "class" => "form-label",
                        "value" => "Prenom"
                    ],
                    "firstname"=>[
                        "balise" => "input",
                        "id"=>"register-form-firstname",
                        "class"=>"form-input",
                        "placeholder"=>"Votre prénom",
                        "type"=>"text",
                        "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        "required"=>true
                    ],
                    "label-lastname" =>[
                        "balise" => "label",
                        "for" => "register-form-lastname",
                        "id" => "label-register-form-lastname",
                        "class" => "form-label",
                        "value" => "Nom"
                    ],
                    "lastname"=>[
                        "balise" => "input",
                        "id"=>"register-form-lastname",
                        "class"=>"form-input",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        "required"=>true
                    ],
                    "end-div-firstname-lastname" => [
                        "balise" => "end-div"
                    ],
                    "div-email" =>[
                        "balise" => "div",
                        "id" => "div-register-email",
                        "class" => "div-form-100"
                    ],
                    "label-email" =>[
                        "balise" => "label",
                        "for" => "register-form-email",
                        "id" => "label-register-form-email",
                        "class" => "form-label",
                        "value" => "Adresse mail"
                    ],
                    "email"=>[
                        "balise" => "input",
                        "id"=>"register-form-email",
                        "class"=>"form-input",
                        "placeholder"=>"Votre email",
                        "type"=>"email",
                        "error"=>"Votre email est incorrect",
                        "required"=>true
                    ],
                    "end-div-email" => [
                        "balise" => "end-div"
                    ],
                    "div-pwd" =>[
                        "balise" => "div",
                        "id" => "div-register-pwd",
                        "class" => "div-form-50"
                    ],
                    "label-pwd" =>[
                        "balise" => "label",
                        "for" => "register-form-pwd",
                        "id" => "label-register-form-pwd",
                        "class" => "form-label",
                        "value" => "Mot de passe"
                    ],
                    "pwd"=>[
                        "balise" => "input",
                        "id"=>"register-form-pwd",
                        "class"=>"form-input",
                        "placeholder"=>"Votre mot de passe",
                        "type"=>"password",
                        "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                        "required"=>true
                    ],
                    "label-pwdConfirm" =>[
                        "balise" => "label",
                        "for" => "register-form-pwd-confirm",
                        "id" => "label-register-form-pwd-confirm",
                        "class" => "form-label",
                        "value" => "Confirmation du mot de passe"
                    ],
                    "pwdConfirm"=>[
                        "balise" => "input",
                        "id"=>"register-form-pwd-confirm",
                        "class"=>"form-input",
                        "placeholder"=>"Confirmation",
                        "type"=>"password",
                        "error"=>"Votre mot de passe de confirmation ne correspond pas",
                        "required"=>true,
                        "confirm"=>"pwd"
                    ],
                    "end-div-pwd" => [
                        "balise" => "end-div"
                    ],
                ]
        ];
        return $this->config;
    }
}
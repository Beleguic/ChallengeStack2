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
                    "class" => "btn btn-outline-primary btn-block mb-4"
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
                    "divId"=>"",
                    "divClass"=>"",
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

    public function getConfigActivation(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"login-form",
                "class"=>"form",
                "enctype"=>"",
                "submit"=>["Activer mon compte"]
            ],
            "submit"=>[
                "Activer mon compte" => [
                    "id" => "",
                    "class" => "btn btn-outline-primary btn-block mb-4"
                ],
            ],
            "divs"=>[
                "div-activation" =>[
                    "id" => "div-login-activation",
                    "class" => "form-group div-form-100 col-md-6 mx-auto",
                    "inside" => ["code","id","id_user"]
                ],
            ],
            "inputs"=>[
                "code"=>[
                    "id"=>"login-form-activation",
                    "class"=>"form-control",
                    "placeholder"=>"Code d'activation",
                    "type"=>"text",
                    "error"=>"Votre Code d'activation est incorrect",
                    "label" =>[
                        "for" => "login-form-activation",
                        "id" => "label-login-form-activation",
                        "class" => "form-label",
                        "value" => "Code d'activation"
                    ],
                    "required"=>true
                ],
                "id"=>[
                    "id"=>"",
                    "class"=>"",
                    "placeholder"=>"",
                    "type"=>"hidden",
                    "error"=>"",
                    "required"=>true
                ],
                "id_user"=>[
                    "id"=>"",
                    "class"=>"",
                    "placeholder"=>"",
                    "type"=>"hidden",
                    "error"=>"",
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }

    public function getConfigResetPwd(): array 
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["Modifier mon mot de passe"],
                    "reset"=>"Annuler"
                ],
                "divs"=>[
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["pwd", "pwdConfirm"]
                    ],
                ],
                "inputs"=>[
                    "pwd"=>[
                        "id"=>"register-form-pwd",
                        "class"=>"form-input",
                        "placeholder"=>"Votre mot de passe",
                        "type"=>"password",
                        "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                        "label" =>[
                            "balise" => "label",
                            "for" => "register-form-pwd",
                            "id" => "label-register-form-pwd",
                            "class" => "form-label",
                            "value" => "Mot de passe"
                        ],
                        "required"=>true
                    ],
                    "pwdConfirm"=>[
                        "id"=>"register-form-pwd-confirm",
                        "class"=>"form-input",
                        "placeholder"=>"Confirmation",
                        "type"=>"password",
                        "error"=>"Votre mot de passe de confirmation ne correspond pas",
                        "required"=>true,
                        "label" =>[
                            "balise" => "label",
                            "for" => "register-form-pwd-confirm",
                            "id" => "label-register-form-pwd-confirm",
                            "class" => "form-label",
                            "value" => "Confirmation du mot de passe"
                        ],
                        "confirm"=>"pwd"
                    ],
                ]
        ];
        return $this->config;
    }
    
}
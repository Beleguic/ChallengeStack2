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
                    "submit"=>["Nous rejoindre"],
                    "reset"=>"Annuler"
                ],
                "submit"=>[
                    "Nous rejoindre" => [
                        "id" => "",
                        "class" => "btn btn-outline-b-n btn-block m-4 w-25"
                    ],
                ],
                "reset"=>[
                    "Annuler" => [
                        "id" => "",
                        "class" => "btn btn-outline-b-n btn-block m-4 w-25"
                    ],
                ],
                "divs"=>[
                    "div-firstname-lastname" =>[
                        "id" => "div-register-firstname-lastname",
                        "class" => "row pb-3",
                        "inside" => ["firstname","lastname"]
                    ],
                    "div-email" =>[
                        "id" => "div-register-email",
                        "class" => "div-form-100 pb-3",
                        "inside" => ["email"]
                    ],
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50 pb-3",
                        "inside" => ["pwd", "pwdConfirm"]
                    ],
                ],
                "inputs"=>[
                    "firstname"=>[
                        "divId"=>"",
                        "divClass"=>"col",
                        "id"=>"register-form-firstname",
                        "class"=>"form-control",
                        "placeholder"=>"Votre prénom",
                        "type"=>"text",
                        "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        "label" =>[
                            
                            "for" => "register-form-firstname",
                            "id" => "label-register-form-firstname",
                            "class" => "form-label color-a",
                            "value" => "Prenom"
                        ],
                        "required"=>true
                    ],
                    "lastname"=>[
                        "divId"=>"",
                        "divClass"=>"col",
                        "id"=>"register-form-lastname",
                        "class"=>"form-control",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        "label" =>[
                            "for" => "register-form-lastname",
                            "id" => "label-register-form-lastname",
                            "class" => "form-label  color-a",
                            "value" => "Nom"
                        ],
                        "required"=>true
                    ],
                    "email"=>[
                        "id"=>"register-form-email",
                        "class"=>"form-control",
                        "placeholder"=>"Votre email",
                        "type"=>"email",
                        "error"=>"Votre email est incorrect",
                        "label" =>[
                            "balise" => "label",
                            "for" => "register-form-email",
                            "id" => "label-register-form-email",
                            "class" => "form-label  color-a",
                            "value" => "Adresse mail"
                        ],
                        "required"=>true
                    ],
                    "pwd"=>[
                        "id"=>"register-form-pwd",
                        "class"=>"form-control",
                        "placeholder"=>"Votre mot de passe",
                        "type"=>"password",
                        "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                        "label" =>[
                            "balise" => "label",
                            "for" => "register-form-pwd",
                            "id" => "label-register-form-pwd",
                            "class" => "form-label  color-a",
                            "value" => "Mot de passe"
                        ],
                        "required"=>true
                    ],
                    "pwdConfirm"=>[
                        "id"=>"register-form-pwd-confirm",
                        "class"=>"form-control",
                        "placeholder"=>"Confirmation du mot de passe",
                        "type"=>"password",
                        "error"=>"Votre mot de passe de confirmation ne correspond pas",
                        "required"=>true,
                        "label" =>[
                            "balise" => "label",
                            "for" => "register-form-pwd-confirm",
                            "id" => "label-register-form-pwd-confirm",
                            "class" => "form-label color-a pt-3",
                            "value" => "Confirmation du mot de passe"
                        ],
                        "confirm"=>"pwd"
                    ],
                ]
        ];
        return $this->config;
    }

    public function getConfigUpdate(): array
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["Modifier les informations", "Annuler"]
                ],
                "divs"=>[
                    "div-firstname-lastname" =>[
                        "id" => "div-register-firstname-lastname",
                        "class" => "div-form-50",
                        "inside" => ["firstname","lastname","status","id"]
                    ],
                ],
                "inputs"=>[
                    "firstname"=>[
                        "id"=>"register-form-firstname",
                        "class"=>"form-input",
                        "placeholder"=>"Votre prénom",
                        "type"=>"text",
                        "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        "label" =>[
                            "for" => "register-form-firstname",
                            "id" => "label-register-form-firstname",
                            "class" => "form-label  color-a",
                            "value" => "Prenom"
                        ],
                        "required"=>true
                    ],
                    "lastname"=>[
                        "id"=>"register-form-lastname",
                        "class"=>"form-input",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        "label" =>[
                            "for" => "register-form-lastname",
                            "id" => "label-register-form-lastname",
                            "class" => "form-label  color-a",
                            "value" => "Nom"
                        ],
                        "required"=>true
                    ],
                    "status"=>[
                        "balise" => "select",
                        "id"=>"type-form-status",
                        "class"=>"form-input",
                        "error"=>"Le status de l'utilisateur est incorrect",
                        "label" =>[
                            "for" => "Type-form-select",
                            "id" => "label-Type-form-select",
                            "class" => "form-label  color-a",
                            "value" => "Status de l'utilisateur"
                        ],
                        "value"=>"statusList",
                        "required"=>true
                    ],
                    "id"=>[
                        "id"=>"",
                        "class"=>"",
                        "placeholder"=>"",
                        "type"=>"hidden",
                        "error"=>"",
                        "value" => "",
                        "required"=>true
                    ],
                ]
        ];
        return $this->config;
    }

    public function getConfigDelete(): array
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["Supprimer", "Annuler"]
                ],
                "divs"=>[
                    "div-firstname-lastname" =>[
                        "id" => "div-register-firstname-lastname",
                        "class" => "div-form-50",
                        "inside" => ["id"]
                    ],
                ],
                "inputs"=>[
                    "id"=>[
                        "id"=>"",
                        "class"=>"",
                        "placeholder"=>"",
                        "type"=>"hidden",
                        "error"=>"",
                        "value" => "",
                        "required"=>true
                    ],
                ]
        ];
        return $this->config;
    }
}
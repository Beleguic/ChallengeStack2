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
                    "submit"=>["Nous rejoindre"]
                ],
                "submit"=>[
                    "Nous rejoindre" => [
                        "id" => "",
                        "class" => "btn btn-outline-primary btn-block mb-4 mt-4"
                    ],
                ],
                "divs"=>[
                    "div-firstname-lastname" =>[
                        "id" => "div-register-firstname-lastname",
                        "class" => "row",
                        "inside" => ["firstname","lastname"]
                    ],
                    "div-email" =>[
                        "id" => "div-register-email",
                        "class" => "div-form-100",
                        "inside" => ["email"]
                    ],
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["pwd", "pwdConfirm"]
                    ],
                ],
                "inputs"=>[
                    "firstname"=>[
                        "id"=>"register-form-firstname",
                        "class"=>"col-4",
                        "placeholder"=>"Votre prénom",
                        "type"=>"text",
                        "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                        "min"=>2,
                        "max"=>60,
                        // "label" =>[
                            
                        //     "for" => "register-form-firstname",
                        //     "id" => "label-register-form-firstname",
                        //     "class" => "form-label",
                        //     "value" => "Prenom"
                        // ],
                        "required"=>true
                    ],
                    "lastname"=>[
                        "id"=>"register-form-lastname",
                        "class"=>"col-4",
                        "placeholder"=>"Votre nom",
                        "type"=>"text",
                        "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                        "min"=>2,
                        "max"=>120,
                        // "label" =>[
                        //     "for" => "register-form-lastname",
                        //     "id" => "label-register-form-lastname",
                        //     "class" => "form-label",
                        //     "value" => "Nom"
                        // ],
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
                            "class" => "form-label",
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
                            "class" => "form-label",
                            "value" => "Mot de passe"
                        ],
                        "required"=>true
                    ],
                    "pwdConfirm"=>[
                        "id"=>"register-form-pwd-confirm",
                        "class"=>"form-control",
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
                        "inside" => ["firstname","lastname", "id"]
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
                            "class" => "form-label",
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
                            "class" => "form-label",
                            "value" => "Nom"
                        ],
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
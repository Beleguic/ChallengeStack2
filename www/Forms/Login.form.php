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
                "submit"=>["Se connecter"],
                "reset"=>"Annuler"
            ],
            "submit"=>[
                "Se connecter" => [
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
                "div-email" =>[
                    "id" => "div-login-email",
                    "class" => "form-group div-form-100",
                    "inside" => ["email"]
                ],
                "div-pwd" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["pwdLogin"]
                ],
            ],
            "inputs"=>[
                "email"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"login-form-email",
                    "class"=>"form-control",
                    "placeholder"=>"E-mail",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "label" =>[
                        "for" => "login-form-email",
                        "id" => "label-login-form-email",
                        "class" => "form-label color-a",
                        "value" => "Adresse mail"
                    ],
                    "required"=>true
                ],
                "pwdLogin"=>[
                    "id"=>"login-form-pwd",
                    "class"=>"form-control",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Votre mot de passe est incorrect",
                    "label" =>[
                        "for" => "login-form-pwd",
                        "id" => "label-login-form-pwd",
                        "class" => "form-label color-a",
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
                    "class" => "btn btn-outline-b-n btn-block m-4 w-25"
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
                    "placeholder"=>"Code",
                    "type"=>"text",
                    "error"=>"Votre Code d'activation est incorrect",
                    "label" =>[
                        "for" => "login-form-activation",
                        "id" => "label-login-form-activation",
                        "class" => "form-label color-a",
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
    
    public function getConfigResetPwdMail(): array 
    {
        $this->config = [
                "config"=>[
                    "method"=>$this->method,
                    "action"=>"",
                    "id"=>"register-form",
                    "class"=>"form",
                    "enctype"=>"",
                    "submit"=>["Confirmer mon mail"],
                    "reset"=>"Annuler"
                ],
                "submit"=>[
                    "Confirmer mon mail" => [
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
                        "error"=>"Votre email est incorrect",
                        "label" =>[
                            "for" => "login-form-email",
                            "id" => "label-login-form-email",
                            "class" => "form-label",
                            "value" => "Adresse mail"
                        ],
                        "required"=>true
                    ]          
                ]
        ];
        return $this->config;
    }

    // Setting change password
    public function getConfigChangePwd(): array 
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"register-form",
                "class"=>"form card card-body bg-light mb-4",
                "enctype"=>"",
                "submit"=>["Enregister"],
                "reset"=>"Annuler"
            ],

            "submit"=>[
                "Enregister" => [
                    "id" => "",
                    "class" => "btn btn-outline-primary btn-block m-4 w-25"
                ],
            ],

            "reset"=>[
                "Annuler" => [
                    "id" => "",
                    "class" => "btn btn-outline-secondary btn-block m-4 w-25"
                ],
            ],

            "divs"=>[
                "div-pwd" =>[
                    "id" => "div-register-pwd",
                    "class" => "",
                    "inside" => ["pwdActuel","pwd", "pwdConfirm"]
                ],
            ],
            "inputs"=>[
                "pwdActuel"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"register-form-pwd-actuel",
                    "class"=>"form-control",
                    "placeholder"=>"",
                    "type"=>"password",
                    "error"=>"Votre mot de passe n'est pas le même",
                    "label" =>[
                        "balise" => "label",
                        "for" => "register-form-pwd-actuel",
                        "id" => "label-register-form-pwd-actuel",
                        "class" => "form-label",
                        "value" => "Mot de passe actuel"
                    ],
                    "required"=>true
                ],
                "pwd"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"register-form-pwd",
                    "class"=>"form-control",
                    "placeholder"=>"",
                    "type"=>"password",
                    "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                    "label" =>[
                        "balise" => "label",
                        "for" => "register-form-pwd",
                        "id" => "label-register-form-pwd",
                        "class" => "form-label",
                        "value" => "Nouveau mot de passe"
                    ],
                    "required"=>true
                ],
                "pwdConfirm"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"register-form-pwd-confirm",
                    "class"=>"form-control",
                    "placeholder"=>"",
                    "type"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                    "required"=>true,
                    "label" =>[
                        "balise" => "label",
                        "for" => "register-form-pwd-confirm",
                        "id" => "label-register-form-pwd-confirm",
                        "class" => "form-label",
                        "value" => "Confirmation du nouveau mot de passe"
                    ],
                    "confirm"=>"pwd"
                ],
            ]
        ];
        return $this->config;
    }

    // Setting change email
    public function getConfigChangeEmail(): array 
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"change-form",
                "class"=>"form card card-body bg-light mb-4",
                "enctype"=>"",
                "submit"=>["Enregister"],
                "reset"=>"Annuler"
            ],

            "submit"=>[
                "Enregister" => [
                    "id" => "",
                    "class" => "btn btn-outline-primary btn-block m-4 w-25"
                ],
            ],

            "reset"=>[
                "Annuler" => [
                    "id" => "",
                    "class" => "btn btn-outline-secondary btn-block m-4 w-25"
                ],
            ],

            "divs"=>[
                "div-email" =>[
                    "id" => "div-change-email",
                    "class" => "",
                    "inside" => ["email"]
                ],
            ],
            "inputs"=>[
                "email"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"change-form-email",
                    "class"=>"form-control",
                    "placeholder"=>"Nouvelle adresse e-mail",
                    "type"=>"email",
                    "error"=>"Wrong format",
                    "label" =>[
                        "balise" => "label",
                        "for" => "change-form-email",
                        "id" => "label-change-form-email",
                        "class" => "form-label",
                        "value" => "Modification de l'adresse e-mail"
                    ],
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }

    public function getConfigChangeInfo(): array 
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"change-form",
                "class"=>"form card card-body bg-light mb-4",
                "enctype"=>"",
                "submit"=>["Enregister"],
                "reset"=>"Annuler"
            ],

            "submit"=>[
                "Enregister" => [
                    "id" => "",
                    "class" => "btn btn-outline-primary btn-block m-4 w-25"
                ],
            ],

            "reset"=>[
                "Annuler" => [
                    "id" => "",
                    "class" => "btn btn-outline-secondary btn-block m-4 w-25"
                ],
            ],

            "divs"=>[
                "div-email" =>[
                    "id" => "div-change-email",
                    "class" => "",
                    "inside" => ["lastname","firstname"]
                ],
            ],
            "inputs"=>[
                "lastname"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"change-form-lastname",
                    "class"=>"form-control",
                    "placeholder"=>"Nouveau nom",
                    "type"=>"text",
                    "error"=>"Wrong format",
                    "label" =>[
                        "balise" => "label",
                        "for" => "change-form-lastname",
                        "id" => "label-change-form-lastname",
                        "class" => "form-label",
                        "value" => "Modification du nom"
                    ],
                    "required"=>true
                ],
                "firstname"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"change-form-firstname",
                    "class"=>"form-control",
                    "placeholder"=>"Nouveau prénom",
                    "type"=>"text",
                    "error"=>"Wrong format",
                    "label" =>[
                        "balise" => "label",
                        "for" => "change-form-firstname",
                        "id" => "label-change-form-firstname",
                        "class" => "form-label",
                        "value" => "Modification du prénom"
                    ],
                    "required"=>true
                ],
            ]
        ];
        return $this->config;
    }
}
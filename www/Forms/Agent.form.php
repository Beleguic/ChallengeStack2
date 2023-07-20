<?php
namespace App\Forms;
use App\Core\Validator;

class Agent extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfigAdd(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"login-form",
                "class"=>"form",
                "enctype"=>"multipart/form-data",
                "submit"=>["Mettre à jour vos information d'agent"],
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
                "div-photo" =>[
                    "id" => "div-login-email",
                    "class" => "form-group div-form-100",
                    "inside" => ["photo"]
                ],
                "div-description" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["description"]
                ],
                "div-telephone" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["telephone","mobile"]
                ],
                "div-skype-facebook" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["skype","facebook"]
                ],
                "div-twitter-instagram" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["twitter","instagram"]
                ],
                "div-linkedin" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["linkedin"]
                ],
            ],
            "inputs"=>[
                "photo"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"agent-form-photo-link",
                    "class"=>"form-control",
                    "placeholder"=>"Photo d'agent",
                    "type"=>"file",
                    "error"=>"Votre photo est incorrect",
                    "label" =>[
                        "for" => "agent-form-photo-link",
                        "id" => "label-agent-form-email",
                        "class" => "form-label color-a",
                        "value" => "Photo de l'agent"
                    ],
                    "required"=>true,
                    "multiple"=>true,
                    "accept"=>".jpg, .jpeg, .png"
                ],
                "description"=>[
                    "balise"=>"textarea",
                    "rows" => "5",  
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Description",
                    "type"=>"text",
                    "error"=>"Votre description est incorrect",
                    "label" =>[
                        "for" => "agent-form-description",
                        "id" => "label-agent-form-description",
                        "class" => "form-label color-a",
                        "value" => "Description"
                    ],
                    "required"=>true
                ],
                "telephone"=>[
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Telephone Mobile",
                    "type"=>"text",
                    "error"=>"Votre telephone mobile est incorrect",
                    "label" =>[
                        "for" => "agent-form-telephone",
                        "id" => "label-agent-form-telephone",
                        "class" => "form-label color-a",
                        "value" => "Telephone Mobile"
                    ],
                    "required"=>false
                ],
                "mobile"=>[
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Telephone Fixe",
                    "type"=>"text",
                    "error"=>"Votre telephone fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-telephone-fixe",
                        "id" => "label-agent-form-telephone-fixe",
                        "class" => "form-label color-a",
                        "value" => "Telephone Fixe"
                    ],
                    "required"=>false
                ],
                "skype"=>[
                    "id"=>"agent-form-skype",
                    "class"=>"form-control",
                    "placeholder"=>"Skype",
                    "type"=>"text",
                    "error"=>"Votre skype fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-skype",
                        "id" => "label-agent-form-skype",
                        "class" => "form-label color-a",
                        "value" => "Skype"
                    ],
                    "required"=>false
                ],
                "facebook"=>[
                    "id"=>"agent-form-facebook",
                    "class"=>"form-control",
                    "placeholder"=>"Facebook",
                    "type"=>"text",
                    "error"=>"Votre facebook fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-facebook",
                        "id" => "label-agent-form-facebook",
                        "class" => "form-label color-a",
                        "value" => "Facebook"
                    ],
                    "required"=>false
                ],
                "twitter"=>[
                    "id"=>"agent-form-twitter",
                    "class"=>"form-control",
                    "placeholder"=>"Twitter",
                    "type"=>"text",
                    "error"=>"Votre twitter fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-twitter",
                        "id" => "label-agent-form-twitter",
                        "class" => "form-label color-a",
                        "value" => "Twitter"
                    ],
                    "required"=>false
                ],
                "instagram"=>[
                    "id"=>"agent-form-instagram",
                    "class"=>"form-control",
                    "placeholder"=>"Instagram",
                    "type"=>"text",
                    "error"=>"Votre instagram fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-instagram",
                        "id" => "label-agent-form-instagram",
                        "class" => "form-label color-a",
                        "value" => "Instagram"
                    ],
                    "required"=>false
                ],
                "linkedin"=>[
                    "id"=>"agent-form-linkedin",
                    "class"=>"form-control",
                    "placeholder"=>"Linkedin",
                    "type"=>"text",
                    "error"=>"Votre linkedin fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-linkedin",
                        "id" => "label-agent-form-linkedin",
                        "class" => "form-label color-a",
                        "value" => "Linkedin"
                    ],
                    "required"=>false
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
                "id"=>"login-form",
                "class"=>"form",
                "enctype"=>"multipart/form-data",
                "submit"=>["Mettre à jour vos information d'agent"],
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
                "div-photo" =>[
                    "id" => "div-login-email",
                    "class" => "form-group div-form-100",
                    "inside" => ["photo","id"]
                ],
                "div-description" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["description"]
                ],
                "div-telephone" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["telephone","mobile"]
                ],
                "div-skype-facebook" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["skype","facebook"]
                ],
                "div-twitter-instagram" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["twitter","instagram"]
                ],
                "div-linkedin" =>[
                    "id" => "div-login-pwd",
                    "class" => "form-group div-form-100",
                    "inside" => ["linkedin"]
                ],
            ],
            "inputs"=>[
                "id"=>[
                    "id"=>"id-hash-update",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "photo"=>[
                    "divId"=>"",
                    "divClass"=>"mb-3",
                    "id"=>"agent-form-photo-link",
                    "class"=>"form-control",
                    "placeholder"=>"Photo d'agent",
                    "type"=>"file",
                    "error"=>"Votre photo est incorrect",
                    "label" =>[
                        "for" => "agent-form-photo-link",
                        "id" => "label-agent-form-email",
                        "class" => "form-label color-a",
                        "value" => "Photo de l'agent"
                    ],
                    "required"=>false,
                    "multiple"=>true,
                    "accept"=>".jpg, .jpeg, .png"
                ],
                "description"=>[
                    "balise"=>"textarea",
                    "rows" => "5",
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Description",
                    "type"=>"text",
                    "error"=>"Votre description est incorrect",
                    "label" =>[
                        "for" => "agent-form-description",
                        "id" => "label-agent-form-description",
                        "class" => "form-label color-a",
                        "value" => "Description"
                    ],
                    "required"=>true
                ],
                "telephone"=>[
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Telephone Mobile",
                    "type"=>"text",
                    "error"=>"Votre telephone mobile est incorrect",
                    "label" =>[
                        "for" => "agent-form-telephone",
                        "id" => "label-agent-form-telephone",
                        "class" => "form-label color-a",
                        "value" => "Telephone Mobile"
                    ],
                    "required"=>false
                ],
                "mobile"=>[
                    "id"=>"agent-form-description",
                    "class"=>"form-control",
                    "placeholder"=>"Telephone Fixe",
                    "type"=>"text",
                    "error"=>"Votre telephone fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-telephone-fixe",
                        "id" => "label-agent-form-telephone-fixe",
                        "class" => "form-label color-a",
                        "value" => "Telephone Fixe"
                    ],
                    "required"=>false
                ],
                "skype"=>[
                    "id"=>"agent-form-skype",
                    "class"=>"form-control",
                    "placeholder"=>"Skype",
                    "type"=>"text",
                    "error"=>"Votre skype fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-skype",
                        "id" => "label-agent-form-skype",
                        "class" => "form-label color-a",
                        "value" => "Skype"
                    ],
                    "required"=>false
                ],
                "facebook"=>[
                    "id"=>"agent-form-facebook",
                    "class"=>"form-control",
                    "placeholder"=>"Facebook",
                    "type"=>"text",
                    "error"=>"Votre facebook fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-facebook",
                        "id" => "label-agent-form-facebook",
                        "class" => "form-label color-a",
                        "value" => "Facebook"
                    ],
                    "required"=>false
                ],
                "twitter"=>[
                    "id"=>"agent-form-twitter",
                    "class"=>"form-control",
                    "placeholder"=>"Twitter",
                    "type"=>"text",
                    "error"=>"Votre twitter fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-twitter",
                        "id" => "label-agent-form-twitter",
                        "class" => "form-label color-a",
                        "value" => "Twitter"
                    ],
                    "required"=>false
                ],
                "instagram"=>[
                    "id"=>"agent-form-instagram",
                    "class"=>"form-control",
                    "placeholder"=>"Instagram",
                    "type"=>"text",
                    "error"=>"Votre instagram fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-instagram",
                        "id" => "label-agent-form-instagram",
                        "class" => "form-label color-a",
                        "value" => "Instagram"
                    ],
                    "required"=>false
                ],
                "linkedin"=>[
                    "id"=>"agent-form-linkedin",
                    "class"=>"form-control",
                    "placeholder"=>"Linkedin",
                    "type"=>"text",
                    "error"=>"Votre linkedin fixe est incorrect",
                    "label" =>[
                        "for" => "agent-form-linkedin",
                        "id" => "label-agent-form-linkedin",
                        "class" => "form-label color-a",
                        "value" => "Linkedin"
                    ],
                    "required"=>false
                ],
            ]
        ];
        return $this->config;
    }
}
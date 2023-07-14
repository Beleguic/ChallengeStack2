<?php
namespace App\Forms;
use App\Core\Validator;

class Status extends Validator
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
                    "submit"=>["Ajouter un status"],
                ],
                "divs"=>[
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["id_status","status"]
                    ],
                ],
                "inputs"=>[
                    "id_status"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"login-form-id_status",
                        "class"=>"form-control",
                        "placeholder"=>"Valeur du status",
                        "type"=>"text",
                        "label" =>[
                            "for" => "login-form-id_status",
                            "id" => "label-login-form-id_status",
                            "class" => "form-label",
                            "value" => "Valeur du status"
                        ],
                        "required"=>true
                    ],
                    "status"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"login-form-status",
                        "class"=>"form-control",
                        "placeholder"=>"Statut",
                        "type"=>"text",
                        "label" =>[
                            "for" => "login-form-status",
                            "id" => "label-login-form-status",
                            "class" => "form-label",
                            "value" => "Statut"
                        ],
                        "required"=>true
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
                    "submit"=>["Modifier le statut","Annuler"],
                ],
                "divs"=>[
                    "div-pwd" =>[
                        "id" => "div-register-pwd",
                        "class" => "div-form-50",
                        "inside" => ["id_status","status","id"]
                    ],
                ],
                "inputs"=>[
                    "id_status"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"login-form-id_status",
                        "class"=>"form-control",
                        "placeholder"=>"Valeur du status",
                        "type"=>"text",
                        "label" =>[
                            "for" => "login-form-id_status",
                            "id" => "label-login-form-id_status",
                            "class" => "form-label",
                            "value" => "Valeur du status"
                        ],
                        "required"=>true
                    ],
                    "status"=>[
                        "divId"=>"",
                        "divClass"=>"",
                        "id"=>"login-form-status",
                        "class"=>"form-control",
                        "placeholder"=>"Statut",
                        "type"=>"text",
                        "label" =>[
                            "for" => "login-form-status",
                            "id" => "label-login-form-status",
                            "class" => "form-label",
                            "value" => "Statut"
                        ],
                        "required"=>true
                    ],
                    "id"=>[
                        "id"=>"",
                        "class"=>"",
                        "type"=>"hidden",
                        "value"=>"",
                        "required"=>true,
                        "placeholder"=>"",
                        "error"=>""
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
                "id"=>"",
                "class"=>"form-delete",
                "enctype"=>"",
                "submit"=>["Supprimer","Annuler"],
            ],
            "divs"=>[
                "div-form" =>[
                    "id" => "div-type-form",
                    "class" => "div-form-100",
                    "inside" => ["id"]
                ],
            ],
            "inputs"=>[
                "id"=>[
                    "id"=>"id-hash-delete",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
            ]
        ];
        return $this->config;
    }
}
<?php
namespace App\Forms;
use App\Core\Validator;

class Type extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfigAdd(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"type-form",
                "class"=>"form-add",
                "enctype"=>"",
                "submit"=>"Ajouter le type d'annonce",
                "reset"=>"Annuler"
            ],
            "divs"=>[
                "div-texte" =>[
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["texte"]
                ],
            ],
            "inputs"=>[
                "texte"=>[
                    "id"=>"type-form-texte",
                    "class"=>"form-input",
                    "placeholder"=>"Type d'annonce",
                    "type"=>"text",
                    "error"=>"Le type d'annonce est incorrect",
                    "label" =>[
                        "for" => "Type-form-texte",
                        "id" => "label-Type-form-texte",
                        "class" => "form-label",
                        "value" => "Type d'annonce"
                    ],
                    "value"=>"",
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
                "action"=>"/ajout-type?update=true",
                "id"=>"",
                "class"=>"form-updatde",
                "enctype"=>"",
                "submit"=>"Modifier le type d'annonce",
            ],
            "divs"=>[
                "div-texte" =>[
                    "id" => "div-type-texte",
                    "class" => "div-form-100",
                    "inside" => ["texte","id_hash"]
                ],
            ],
            "inputs"=>[
                "id_hash"=>[
                    "id"=>"id-hash-update",
                    "class"=>"",
                    "type"=>"hidden",
                    "value"=>"",
                    "required"=>true,
                    "placeholder"=>"",
                    "error"=>""
                ],
                "texte"=>[
                    "id"=>"texte-update",
                    "class"=>"form-input",
                    "type"=>"text",
                    "value"=>"",
                    "error"=>"Le type d'annonce est incorrect",
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
                "action"=>"/ajout-type?delete=true",
                "id"=>"",
                "class"=>"form-delete",
                "enctype"=>"",
                "submit"=>"Supprimer"
            ],
            "divs"=>[
                "div-form" =>[
                    "id" => "div-type-form",
                    "class" => "div-form-100",
                    "inside" => ["id_hash"]
                ],
            ],
            "inputs"=>[
                "id_hash"=>[
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